const addressElem = document.getElementById('addressElem');

// Function to calculate the distance between two coordinates using Haversine formula
function calculateDistance(lat1, lon1, lat2, lon2) {
  const R = 6371; // Radius of the Earth in kilometers
  const dLat = (lat2 - lat1) * (Math.PI / 180);
  const dLon = (lon2 - lon1) * (Math.PI / 180);
  const a =
    Math.sin(dLat / 2) * Math.sin(dLat / 2) +
    Math.cos(lat1 * (Math.PI / 180)) * Math.cos(lat2 * (Math.PI / 180)) * Math.sin(dLon / 2) * Math.sin(dLon / 2);
  const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
  const distance = R * c;
  return distance;
}

async function fetchAndDisplayData(latitude, longitude) {
  try {
    // Fetch the data from the database
    const response = await fetch('http://localhost/api/get_grid_list.php', {
      method: 'GET',
      headers: {
        'Content-Type': 'application/json',
      },
    });

    const allData = await response.json();

    // Filter nearby locations based on the live grid latitude and longitude
    const nearbyLocations = allData.filter((place) => {
      const distance = calculateDistance(latitude, longitude, place.latitude, place.longitude);
      return distance <= 1; // You can adjust the distance (in kilometers) as needed
    });

    updateCards(nearbyLocations);
  } catch (error) {
    console.error('Error fetching data:', error);
  }
}

function updateCards(data) {
  const cardContainer = document.getElementById('cardContainer');
  cardContainer.innerHTML = '';

  data.forEach(place => {
    const card = document.createElement('div');
    card.classList.add('col-md-4', 'mb-4');

    const cardContent = `
      <div class="card locations ads-card">
        <div class="card-header">
        </div>
        <img src="${place.image_filepath}" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text"><b>Name:</b> ${place.title}</p>
          <p class="card-text"><b>Address: </b>${place.address}</p>
          <p class="card-text"><b>Price:</b> ${place.price}</p>
          <p class="card-text"><b>Gender: </b> ${place.room_type}</p>
          <div class="row">
            <div class="col"> <a href="https://wa.me/+${place.contact_information}" class="btn" style="background-color:#7C0C0C; color:white">WhatsApp</a></div>
            <div class="col">  <a href="tel:+${place.gender}" class="btn btn-secondary">Call Now</a></div>
          </div>
        </div>
        <div class="card-footer text-body-secondary">
        </div>
      </div>
    `;

    card.innerHTML = cardContent;
    cardContainer.appendChild(card);
  });
}

const getLivePlacesBtn = document.getElementById('getLivePlacesBtn');
getLivePlacesBtn.addEventListener('click', () => {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      (position) => {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;

        // Get the live grid latitude and longitude
        const liveGridLatitude = latitude;
        const liveGridLongitude = longitude;

        // Reverse geocode to get the address
        reverseGeocode(latitude, longitude)
          .then((address) => {
            addressElem.textContent = `Address: ${address}`;

            // Fetch and display nearby locations based on the live grid latitude and longitude
            fetchAndDisplayData(liveGridLatitude, liveGridLongitude);
          })
          .catch((error) => {
            console.error('Error:', error);
            addressElem.textContent = 'Address not available.';
          });
      },
      (error) => {
        console.error('Error:', error);
        addressElem.textContent = 'Location permission denied.';
      }
    );
  } else {
    console.log('Geolocation is not supported by this browser.');
    addressElem.textContent = 'Geolocation is not supported.';
  }
});

function reverseGeocode(latitude, longitude) {
  const apiUrl = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`;

  return fetch(apiUrl)
    .then((response) => response.json())
    .then((data) => {
      if (data.address) {
        return data.display_name;
      } else {
        throw new Error('No address found.');
      }
    });
}


