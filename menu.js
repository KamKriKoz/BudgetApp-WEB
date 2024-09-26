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


document.addEventListener('DOMContentLoaded', function() {
    const currencyDropdown = document.getElementById('currencyDropdown');
    const currencyItems = document.querySelectorAll('.dropdown-item[data-currency]');
    const selectedCurrencyInput = document.getElementById('selectedCurrency');
    
    currencyItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const currency = e.target.getAttribute('data-currency');
            currencyDropdown.innerHTML = currency;
            selectedCurrencyInput.value = currency;
        });
    });

    const categoryDropdown = document.getElementById('incomeDropdown');
    const categoryItems = document.querySelectorAll('.dropdown-item[data-category]');
    const customCategoryLink = document.getElementById('customCategoryIncome');
    const customInput = document.getElementById('customInputIncome');
    const selectedCategoryInput = document.getElementById('selectedCategoryIncome');

    categoryItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const category = e.target.getAttribute('data-category');
            
            if (category === 'Other') {
                customInput.style.display = 'block';
                selectedCategoryInput.value = '';
                categoryDropdown.innerHTML = `Other`;
            } else {
                customInput.style.display = 'none';
                selectedCategoryInput.value = category;
                categoryDropdown.innerHTML = category;
            }
        });
    });

    customCategoryLink.addEventListener('click', function(e) {
        e.preventDefault();
        customInput.style.display = 'block';
        selectedCategoryInput.value = '';
        categoryDropdown.innerHTML = `Other`;
    });

    const form = document.getElementById('incomeForm');

    form.addEventListener('submit', function(e) {
        if (!selectedCurrencyInput.value) {
            alert("Please select a currency.");
            e.preventDefault();
            return;
        }

        if (!selectedCategoryInput.value && customInput.style.display === 'none') {
            alert("Please select a category.");
            e.preventDefault();
            return;
        }

        if (customInput.style.display === 'block' && !customInput.value.trim()) {
            alert("Please enter a custom category.");
            e.preventDefault();
            return;
        }

        if (customInput.style.display === 'block' && customInput.value.trim()) {
            selectedCategoryInput.value = customInput.value.trim();
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const currencyDropdown = document.getElementById('currencyDropdown');
    const currencyItems = document.querySelectorAll('.dropdown-item[data-currency]');
    const selectedCurrencyInput = document.getElementById('selectedCurrency'); // Dodaj ten element w HTML

    currencyItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const currency = e.target.getAttribute('data-currency');
            currencyDropdown.innerHTML = currency;
            selectedCurrencyInput.value = currency;
        });
    });

    const paymentMethodDropdown = document.getElementById('paymentMethodDropdown');
    const methodItems = document.querySelectorAll('.dropdown-item[data-method]');
    const selectedPayment = document.getElementById('selectedPayment');
    const customPaymentMethodInput = document.getElementById('customPaymentMethodExpense');
	const customPaymentELink = document.getElementById('customMethodExpense');

    methodItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const method = e.target.getAttribute('data-method');

            if (method === 'Other') {
                customPaymentMethodInput.style.display = 'block';
                selectedPayment.value = '';
				paymentMethodDropdown.innerHTML = 'Other';
            } else {
                customPaymentMethodInput.style.display = 'none';
				selectedPayment.value = method;
                paymentMethodDropdown.innerHTML = method;
            }
        });
    });
	
	    customPaymentELink.addEventListener('click', function(e) {
        e.preventDefault();
        customPaymentMethodInput.style.display = 'block';
        selectedPayment.value = '';
        paymentMethodDropdown.innerHTML = 'Other';
    });

    const categoryExpenseDropdown = document.getElementById('expenseDropdown');
    const categoryEItems = document.querySelectorAll('.dropdown-item[data-category]');
    const customCategoryELink = document.getElementById('customCategoryExpense');
    const customEInput = document.getElementById('customInputExpense');
    const selectedCategoryEInput = document.getElementById('selectedCategoryExpense');

    categoryEItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const category = e.target.getAttribute('data-category');
            
            if (category === 'Other') {
                customEInput.style.display = 'block';
                selectedCategoryEInput.value = '';
                categoryExpenseDropdown.innerHTML = 'Other';
            } else {
                customEInput.style.display = 'none';
                selectedCategoryEInput.value = category;
                categoryExpenseDropdown.innerHTML = category;
            }
        });
    });

    customCategoryELink.addEventListener('click', function(e) {
        e.preventDefault();
        customEInput.style.display = 'block';
        selectedCategoryEInput.value = '';
        categoryExpenseDropdown.innerHTML = 'Other';
    });

    const form = document.getElementById('expenseForm');

    form.addEventListener('submit', function(e) {
        if (!selectedCurrencyInput.value) {
            alert("Please select a currency.");
            e.preventDefault();
            return;
        }

        if (!selectedCategoryEInput.value && customEInput.style.display === 'none') {
            alert("Please select a category.");
            e.preventDefault();
            return;
        }

        if (customEInput.style.display === 'block' && !customEInput.value.trim()) {
            alert("Please enter a custom category.");
            e.preventDefault();
            return;
        }

        if (customEInput.style.display === 'block' && customEInput.value.trim()) {
            selectedCategoryEInput.value = customEInput.value.trim();
        }

        if (!selectedPayment.value && customPaymentMethodInput.style.display === 'none') {
            alert("Please select a payment method.");
            e.preventDefault();
            return;
        }

        if (customPaymentMethodInput.style.display === 'block' && !customPaymentMethodInput.value.trim()) {
            alert("Please enter a payment method.");
            e.preventDefault();
            return;
        }

        if (customPaymentMethodInput.style.display === 'block' && customPaymentMethodInput.value.trim()) {
            selectedPayment.value = customPaymentMethodInput.value.trim();
        }        
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const dateRangeSpan = document.getElementById('dateRange');
    const balanceDropdown = document.getElementById('balanceDropdown');
    const dropdownItems = document.querySelectorAll('.dropdown-item');

    const now = new Date();
    const startDate = new Date(now.getFullYear(), now.getMonth(), 1);
    const endDate = new Date(now.getFullYear(), now.getMonth() + 1, 0);
    const startDateFormatted = startDate.toLocaleDateString();
    const endDateFormatted = endDate.toLocaleDateString();

    dateRangeSpan.innerHTML = `${startDateFormatted} - ${endDateFormatted}`;
    balanceDropdown.innerText = 'Current month';

    dropdownItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const selectedRange = e.target.getAttribute('data-range');
            let startDate, endDate;

            const now = new Date();

            switch (selectedRange) {
                case 'current-month':
                    startDate = new Date(now.getFullYear(), now.getMonth(), 1);
                    endDate = new Date(now.getFullYear(), now.getMonth() + 1, 0);
                    break;
                case 'previous-month':
                    startDate = new Date(now.getFullYear(), now.getMonth() - 1, 1);
                    endDate = new Date(now.getFullYear(), now.getMonth(), 0);
                    break;
                case 'current-year':
                    startDate = new Date(now.getFullYear(), 0, 1);
                    endDate = new Date(now.getFullYear() + 1, 0, 0);
                    break;
                case 'custom':
                    // Handle custom date range logic if needed
                    break;
            }

            const startDateFormatted = startDate.toLocaleDateString();
            const endDateFormatted = endDate.toLocaleDateString();
            dateRangeSpan.innerText = `${startDateFormatted} - ${endDateFormatted}`;
            balanceDropdown.innerText = e.target.innerText;
        });
    });
});
