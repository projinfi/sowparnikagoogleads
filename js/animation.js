document.addEventListener('DOMContentLoaded', function() {
    const enquireButtons = document.querySelectorAll('.card-enq-btn');
    const dropdowns = document.querySelectorAll('.sowparnika-form-body');
    const closeButtons = document.querySelectorAll('.closeicon, .close-mobile-icon');

    // Function to show the modal with animation
    function showModal(dropdown) {
        dropdown.classList.add('active');
    }

    // Function to hide the modal
    function hideModal() {
        dropdowns.forEach(dropdown => dropdown.classList.remove('active'));
        // Optional: Delay hiding the display until the animation ends
        setTimeout(() => {
            dropdowns.forEach(dropdown => dropdown.style.display = 'none');
        }, 10); // Match this duration to your CSS transition time
    }

    // Event listener to open the modal
    enquireButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const targetDropdown = document.getElementById(`${targetId}DropDown`);

            dropdowns.forEach(dropdown => {
                if (dropdown === targetDropdown) {
                    dropdown.style.display = 'flex';
                    setTimeout(() => showModal(dropdown), 10); // Slight delay to trigger the transition
                } else {
                    dropdown.style.display = 'none';
                }
            });
        });
    });

    // Event listeners to close the modal
    closeButtons.forEach(button => {
        button.addEventListener('click', hideModal);
    });
});
