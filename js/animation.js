document.addEventListener('DOMContentLoaded', function() {
    // Selecting all buttons that trigger modals
    const enquireButtons = document.querySelectorAll('.card-enq-btn, .make-enquiry-btn');
    const dropdowns = document.querySelectorAll('.sowparnika-form-body');
    const closeButtons = document.querySelectorAll('.closeicon, .close-mobile-icon');

    // Function to show the modal with animation
    function showModal(dropdown) {
        dropdown.classList.add('active'); // Add your CSS transition class
    }

    // Function to hide all modals
    function hideModal() {
        dropdowns.forEach(dropdown => {
            dropdown.classList.remove('active');
            // Optional: Delay setting display to 'none' until after the animation ends
            setTimeout(() => {
                dropdown.style.display = 'none';
            }, 300); // Adjust based on your CSS transition duration
        });
    }

    // Event listener to open the modal
    enquireButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const targetDropdown = document.getElementById(`${targetId}DropDown`);

            // Hide other modals and display the targeted one
            dropdowns.forEach(dropdown => {
                if (dropdown === targetDropdown) {
                    dropdown.style.display = 'flex'; // Ensure it's visible
                    setTimeout(() => showModal(dropdown), 10); // Trigger transition after a short delay
                } else {
                    dropdown.style.display = 'none'; // Hide others
                }
            });
        });
    });

    // Event listeners to close the modal
    closeButtons.forEach(button => {
        button.addEventListener('click', hideModal);
    });
});

