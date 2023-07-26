const api = "https://jsonplaceholder.typicode.com/users";
let usersData = []; // datos de usuario

// Crear una fila para cada usuario
function createTableRow(user) {
  const row = document.createElement("tr");
  const nameCell = document.createElement("td");
  const emailCell = document.createElement("td");
  const addressCell = document.createElement("td");

  nameCell.textContent = user.name;
  emailCell.textContent = user.email;
  addressCell.textContent = `${user.address.street}, ${user.address.suite}, ${user.address.city}`;

  row.appendChild(nameCell);
  row.appendChild(emailCell);
  row.appendChild(addressCell);

  return row;
}

// mostrar la lista de usuarios en la tabla
function showUserList(users) {
  const tableBody = document.getElementById("userTableBody");
  tableBody.innerHTML = ""; // Limpiar tabla

  users.forEach(function (user) {
    const row = createTableRow(user);
    tableBody.appendChild(row);
  });
}

// Petición GET utilizando fetch()
fetch(api)
  .then((response) => {
    if (!response.ok) {
      throw new Error("La respuesta de la API no fue exitosa.");
    }
    return response.json();
  })
  .then((users) => {
    usersData = users; // Almacenar la lista de usuarios en la variable usersData
    showUserList(users);
  })
  .catch((error) => {
    console.error("Error al obtener la lista de usuarios:", error);
  });

// Evento de escucha para la búsqueda 
const searchInput = document.getElementById("searchInput");
searchInput.addEventListener("input", function () {
  const searchQuery = searchInput.value.toLowerCase();
  const filteredUsers = usersData.filter((user) => {
    const name = user.name.toLowerCase();
    const email = user.email.toLowerCase();
    return name.includes(searchQuery) || email.includes(searchQuery);
  });
  showUserList(filteredUsers);
});
 