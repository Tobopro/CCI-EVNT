

// Function for the + and - buttons for participants number
document.addEventListener("DOMContentLoaded", function () {
    var btnPlus = document.getElementById('btnPlus');
    var btnMinus = document.getElementById('btnMinus');
    var inputField = document.getElementById('nombreParticipants');

    btnPlus.addEventListener('click', function () {
        var currentValue = parseInt(inputField.value) || 0;
        inputField.value = currentValue + 1;
    });

    btnMinus.addEventListener('click', function () {
        var currentValue = parseInt(inputField.value) || 0;
        if (currentValue > 0) {
            inputField.value = currentValue - 1;
        }
    });
});

// Function for adding two choices of categories

document.addEventListener('DOMContentLoaded', function () {
    const select = document.getElementById('categories');
    const categoryList = document.querySelector('.category-list');

    select.addEventListener('change', function () {
        const selectedOptions = Array.from(select.selectedOptions);
        if (selectedOptions.length > 2) {
            // Empêcher la sélection de plus de 2 options
            select.selectedIndex = -1;
        } else {
            categoryList.innerHTML = '';
            for (const option of selectedOptions) {
                const category = document.createElement('li');
                category.textContent = option.textContent;
                categoryList.appendChild(category);
            }
        }
    });
});

const categoryButton = document.getElementById('categoryButton');
const select = document.getElementById('categories');

categoryButton.addEventListener('click', function () {
    select.style.display = 'block';
});

select.addEventListener('change', function () {
    select.style.display = 'none';
    categoryButton.textContent = 'Catégories sélectionnées';
});


// TODO confirm Delete 