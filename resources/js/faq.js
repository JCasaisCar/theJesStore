"use strict";

if (document.body.id === 'faqPage') {
    // ===============================
    // FUNCIONES ACCESIBLES GLOBALMENTE
    // ===============================

    window.toggleFAQ = function (element) {
        const answer = element.nextElementSibling;
        answer.classList.toggle('hidden');
        const icon = element.querySelector('.fa-chevron-down');
        icon.style.transform = answer.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
    };

    window.filterFAQByCategory = function (category) {
        document.getElementById('searchFAQ').value = '';
        document.querySelectorAll('.faq-category').forEach(cat => cat.style.display = 'block');
        document.getElementById('noResults').classList.add('hidden');

        if (category === 'todas') return;

        document.querySelectorAll('.faq-category').forEach(cat => {
            if (cat.getAttribute('data-category') !== category) {
                cat.style.display = 'none';
            }
        });

        document.getElementById('faqContainer').scrollIntoView({ behavior: 'smooth' });
    };

    window.searchFAQs = function () {
        const searchText = document.getElementById('searchFAQ').value.toLowerCase();
        const faqItems = document.querySelectorAll('.faq-item');
        let foundResults = false;

        if (searchText === '') {
            document.querySelectorAll('.faq-category').forEach(cat => cat.style.display = 'block');
            faqItems.forEach(item => item.style.display = 'block');
            document.getElementById('noResults').classList.add('hidden');
            return;
        }

        document.querySelectorAll('.faq-category').forEach(cat => {
            cat.style.display = 'block';
            let categoryHasResults = false;

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

            if (!categoryHasResults) {
                cat.style.display = 'none';
            }
        });

        document.getElementById('noResults').classList.toggle('hidden', foundResults);
    };

    window.resetSearch = function () {
        document.getElementById('searchFAQ').value = '';
        window.searchFAQs();
    };
}