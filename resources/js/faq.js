"use strict";
if (document.body.id === 'faqPage') {
    // Función para mostrar/ocultar respuestas
    function toggleFAQ(element) {
        // Buscar el elemento de respuesta adyacente
        const answer = element.nextElementSibling;
        
        // Alternar visibilidad
        answer.classList.toggle('hidden');
        
        // Rotar el icono
        const icon = element.querySelector('.fa-chevron-down');
        if (answer.classList.contains('hidden')) {
            icon.style.transform = 'rotate(0deg)';
        } else {
            icon.style.transform = 'rotate(180deg)';
        }
    }
    
    // Función para filtrar por categoría
    function filterFAQByCategory(category) {
        // Reiniciar la búsqueda
        document.getElementById('searchFAQ').value = '';
        
        // Mostrar todas las categorías primero
        document.querySelectorAll('.faq-category').forEach(cat => {
            cat.style.display = 'block';
        });
        
        // Ocultar el mensaje de "sin resultados"
        document.getElementById('noResults').classList.add('hidden');
        
        // Si se seleccionó "todas", mostrar todas las categorías
        if (category === 'todas') return;
        
        // Ocultar categorías que no coinciden
        document.querySelectorAll('.faq-category').forEach(cat => {
            if (cat.getAttribute('data-category') !== category) {
                cat.style.display = 'none';
            }
        });
        
        // Desplazarse suavemente hacia las preguntas
        document.getElementById('faqContainer').scrollIntoView({ behavior: 'smooth' });
    }
    
    // Función para buscar preguntas
    function searchFAQs() {
        const searchText = document.getElementById('searchFAQ').value.toLowerCase();
        const faqItems = document.querySelectorAll('.faq-item');
        let foundResults = false;
        
        if (searchText === '') {
            // Si la búsqueda está vacía, mostrar todas las categorías y preguntas
            document.querySelectorAll('.faq-category').forEach(cat => {
                cat.style.display = 'block';
            });
            
            faqItems.forEach(item => {
                item.style.display = 'block';
            });
            
            document.getElementById('noResults').classList.add('hidden');
            return;
        }
        
        // Mostrar categorías para iniciar
        document.querySelectorAll('.faq-category').forEach(cat => {
            cat.style.display = 'block';
            let categoryHasResults = false;
            
            // Buscar en las preguntas de esta categoría
            const questions = cat.querySelectorAll('.faq-item');
            questions.forEach(item => {
                const question = item.querySelector('button span').textContent.toLowerCase();
                const answer = item.querySelector('.faq-answer p').textContent.toLowerCase();
                
                if (question.includes(searchText) || answer.includes(searchText)) {
                    item.style.display = 'block';
                    categoryHasResults = true;
                    foundResults = true;
                } else {
                    item.style.display = 'none';
                }
            });
            
            // Si no hay resultados en esta categoría, ocultarla
            if (!categoryHasResults) {
                cat.style.display = 'none';
            }
        });
        
        // Mostrar mensaje de "sin resultados" si es necesario
        if (!foundResults) {
            document.getElementById('noResults').classList.remove('hidden');
        } else {
            document.getElementById('noResults').classList.add('hidden');
        }
    }
    
    // Función para resetear la búsqueda
    function resetSearch() {
        document.getElementById('searchFAQ').value = '';
        searchFAQs();
    }
}