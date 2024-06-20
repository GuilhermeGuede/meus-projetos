<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


// função da pagina home.php para que os slides possa passar para o proximo
let currentIndex = 0;

function moveSlide(direction) {
    const carouselInner = document.querySelector('.carousel-inner');
    const slides = document.querySelectorAll('.carousel-inner img');
    const totalSlides = slides.length;

    currentIndex += direction;

    if (currentIndex < 0) {
        currentIndex = totalSlides - 1;
    } else if (currentIndex >= totalSlides) {
        currentIndex = 0;
    }

    const offset = -currentIndex * 100;
    carouselInner.style.transform = `translateX(${offset}%)`;
}

// função da pagina curriculoClt.php, para inserir outro tipo de vaga
function validatePhone(input) {
    // Remove qualquer caractere que não seja número
    input.value = input.value.replace(/\D/g, '');

    // Limita a 11 caracteres
    if (input.value.length > 11) {
        input.value = input.value.slice(0, 11);
    }
}

// função para aparecer a opção do campo "outra vaga", na pagina curriculo_clt.php
function toggleOutraVaga() {
    var vagaSelect = document.getElementById("vaga");
    var outraVagaContainer = document.getElementById("outra_vaga_container");
    if (vagaSelect.value === "outras") {
        outraVagaContainer.style.display = "block";
        document.getElementById("outra_vaga").required = true;
    } else {
        outraVagaContainer.style.display = "none";
        document.getElementById("outra_vaga").required = false;
    }
}


