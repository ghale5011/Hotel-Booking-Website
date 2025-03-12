<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    /**
     * Function to display alert messages dynamically
     * @param {string} type - Type of alert ('success' or 'error')
     * @param {string} msg - Message to display in the alert
     */
    function alert(type, msg) {
        let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger'; // Determine Bootstrap alert class
        let element = document.createElement('div'); // Create a new div element
        
        // Construct the alert HTML structure
        element.innerHTML = `
        <div class="alert ${bs_class} alert-dismissible fade show custom-alert" role="alert">
            <strong class="me-3">${msg}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        `;
        
        document.body.append(element); // Append the alert to the body
    }
</script>
