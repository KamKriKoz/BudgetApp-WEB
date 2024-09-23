document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            const selectedCategory = this.textContent;
            const dropdownButton = this.closest('.dropdown').querySelector('.dropdown-toggle');
            dropdownButton.textContent = selectedCategory;
        });
    });

    const customCategoryIncome = document.getElementById('customCategoryIncome');
    const customInputIncome = document.getElementById('customInputIncome');

    customCategoryIncome.addEventListener('click', function () {
        customInputIncome.style.display = 'block';
        customInputIncome.focus();
    });

    const customCategoryExpense = document.getElementById('customCategoryExpense');
    const customInputExpense = document.getElementById('customInputExpense');

    customCategoryExpense.addEventListener('click', function () {
        customInputExpense.style.display = 'block';
        customInputExpense.focus();
    });

    const customMethodExpense = document.getElementById('customMethodExpense');
    const customInputMethodExpense = document.getElementById('customInputMethodExpense');

    customMethodExpense.addEventListener('click', function () {
        customInputMethodExpense.style.display = 'block';
        customInputMethodExpense.focus();
    });
});

document.querySelectorAll('.cancel').forEach(button => {
    button.addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById('start-tab').click();
    });
});