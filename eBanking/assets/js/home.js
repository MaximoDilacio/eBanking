function getCookie(name) {
    let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
    if (match) {
        return match[2];
    }
    return null;
}

let nombreUsuario = getCookie('nombreUsuario') ? getCookie('nombreUsuario') : 'Invitado';
nombreUsuario2 = nombreUsuario ? decodeURIComponent(nombreUsuario) : 'Invitado';

let btnCuenta = document.getElementById('btnCuenta');
btnCuenta.addEventListener('click', function() {
    let contenedor = document.getElementById('content-home');
    
    // Insertar el nombre del usuario dentro del HTML dinámico
    contenedor.innerHTML = `
        <div class="content-cuenta">
            <div class="header-cuenta">
                <h2><i class="bi bi-person-bounding-box"></i> ${nombreUsuario2}</h2> 
            </div>

            <div class="datos-cuenta">
                <table>
                    <tr id="header-table">
                        <td>Cuenta</td>
                        <td>Moneda</td>
                        <td>Saldo</td>
                    </tr>

                    <tr id="footer-table">
                        <td>CU-00007</td>
                        <td>$</td>
                        <td>$15.000</td>
                    </tr>
                </table>
            </div>
        </div>
    `;
});


let btnMovimientos = document.getElementById('btnMovimientos');
btnMovimientos.addEventListener('click', function(){
    let contenedor = document.getElementById('content-home')
    contenedor.innerHTML = `
    
       <div class = "content-movimientos">
            <div class = "header-movimientos">
                <h2><i class="bi bi-file-text"></i> Mis Movimientos</h2> 
            </div>


        <div class = "content-table">
            <table>
                <th>
                    <tr id = "header-table">
                        <td id = "weightFont">Movimientos</td>

                        <td id = "weightFont">Fecha</td>
                    <tr>
                </th>
                
                <tr id = "footer-table">
                    <td>Movimiento 1</td>
         
                    <td>14/09/2024</td>
                </tr>

                
            <table>
        </div>
       </div>
    `; 
})


let btnTransferir = document.getElementById('btnTransferir');
btnTransferir.addEventListener('click', function(){
    let contenedor = document.getElementById('content-home')
    contenedor.innerHTML = `
    
    <div class="contentTransferir">
    <div class="headerTransferir">
        <h2>Transferir</h2>
    </div>

    <div class="midTransferir">
        <form action="">
            <div class="header-form">
                <input type="text" name="" id="destino" placeholder="Ingrese el numero de cuenta destinatario">
                <label for="destino">- 00001</label>
            </div>

            <div class="mid-form">
                <input type="number" name="" id="" placeholder="Ingrese monto a transferir ($)" min="150">
            </div>

            <div class="mid-form2">
                <select name="" id="">
                    <option value="">Cuenta 1</option>
                    <option value="">Cuenta 2</option>
                    <option value="">Cuenta 3</option>
                </select>
                <input type="text" id = "" placeholder = "Concepto">
            </div>

            <div class="footer-form">
                <input type="password" name="" id="" required placeholder="Ingrese su contraseña">
            </div>

            <input type = "submit" id = "btnFormTransfer" value = "Transferir">
        </form>
    </div>
</div>

    `;
})

