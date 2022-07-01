var contenido = document.getElementById("contenido");
/*$(".categorias").click(function() {
    $(contenido) = $(this).html (*/
function cambiarContenido() {
    document.getElementById("primero").innerHTML = "Miguel de Cervantes";
}
function cambiar() {
    var contenido = document.getElementById("contenido");
    contenido.innerHTML = 
        <div id="categorias">
            <div class="card">
                <div class="card-tittle">
                    <h2>Miguel de Cervantes</h2>
                </div>
                <div class="card-image">
                    <a href="Ebook.html">
                        <img src="Images2/6.png" alt="Harry Potter y el prisionero de Azkaban"/>
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-tittle">
                    <h2>Jane Austen</h2>
                </div>
                <div class="card-image">
                    <img src="Images2/2.png" alt="Juego De Tronos"/>
                </div>
            </div>
            <div class="card">
                <div class="card-tittle">
                    <h2>Mary Shelley</h2>
                </div>
                <div class="card-image">
                    <img src="Images2/3.png" alt="El Despertar de los Dragones"/>
                </div>
            </div>
            <div class="card">
                <div class="card-tittle">
                    <h2>La Odisea</h2>
                </div>
                <div class="card-image">
                    <img src="Images2/4.png" alt="La Odisea"/>
                </div>
            </div>
            <div class="card">
                <div class="card-tittle">
                    <h2>Estudio en Escarlata</h2>
                </div>
                <div class="card-image">
                    <img src="Images2/5.png" alt="Estudio en Escarlata"/>
                </div>
            </div>
            <div class="card">
                <div class="card-tittle">
                    <h2>Las Memorias de Sherlock Holmes</h2>
                </div>
                <div class="card-image">
                    <img src="Images/SH3.jpg" alt="Las Memorias de Sherlock Holmes"/>
                </div>
            </div>
            <div class="card">
                <div class="card-tittle">
                    <h2>El Despertar del Valiente</h2>
                </div>
                <div class="card-image">
                    <img src="Images/MR1.jpg" alt="El Despertar del Valiente"/>
                </div>
            </div>
            <div class="card">
                <div class="card-tittle">
                    <h2>Harry Potter y la Piedra Filosofal</h2>
                </div>
                <div class="card-image">
                    <img src="Images2/1.png" alt="Harry Potter y La Piedra Filosofal"/>
                </div>
            </div>
        </div>
    }