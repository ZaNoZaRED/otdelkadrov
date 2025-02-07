// modal
const openModalBtns = document.querySelectorAll('.openModalBtn');
const modal = document.getElementById('modalForm');
const closeModalBtn = document.getElementById('closeModalBtn');
openModalBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
        modal.style.display = 'block';
    });
});
closeModalBtn.addEventListener('click', () => {
    modal.style.display = 'none';
});
window.addEventListener('click', (event) => {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});
function redirectToCart() {
    window.location.href = '/cart'; // Перенаправляет на страницу /cart
}

// new string for form
document.addEventListener("DOMContentLoaded", function() {
    const maxSpecialties = 5;
    const specializationsContainer = document.getElementById("specializationsContainer");
    const maxSpecialtiesError = document.getElementById("maxSpecialtiesError");

    specializationsContainer.addEventListener("click", function(e) {
        if (e.target.classList.contains("add-specialty-btn")) {
            const specialtyGroups = specializationsContainer.querySelectorAll(".specialty-group");
            if (specialtyGroups.length < maxSpecialties) {
                const newSpecialtyGroup = document.createElement("div");
                newSpecialtyGroup.classList.add("specialty-group");
                newSpecialtyGroup.innerHTML = `
                    <select name="specialization[]" required>
                        @foreach($specializations as $specialization)
                            <option value="{{ $specialization->name }}">{{ $specialization->name }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="quantity[]" placeholder="Количество" required min="1">
                    <button type="button" class="remove-specialty-btn">-</button>
                `;
                specializationsContainer.appendChild(newSpecialtyGroup);
                maxSpecialtiesError.style.display = 'none'; // Скрываем сообщение об ошибке
            } else {
                maxSpecialtiesError.style.display = 'block'; // Показываем сообщение об ошибке
            }
        }
    });

    specializationsContainer.addEventListener("click", function(e) {
        if (e.target.classList.contains("remove-specialty-btn")) {
            e.target.closest(".specialty-group").remove(); // Удаляем выбранную группу специальностей
        }
    });
});