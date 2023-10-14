<!-- Include Bootstrap 5 and SweetAlert2 -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<!-- Styling -->

<style>

    body {

        background-color: #f8f8f8;

    }

    .form-container {

        background-color: white;

        padding: 30px;

        border-radius: 8px;

        max-width: 500px;

        margin: 50px auto;

        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);

    }

    h2 {

        font-size: 24px;

        margin-bottom: 20px;

    }

</style>



<!-- Form -->

<div class="form-container">

    <h2>Fill in here</h2>

    <form id="menuForm">

        <div class="mb-3">

            <label for="menuName" class="form-label">Menu Name</label>

            <input type="text" class="form-control" id="menuName" maxlength="100" required>

        </div>

        <div class="mb-3">

            <label for="menuDescription" class="form-label">Menu Description</label>

            <textarea class="form-control" id="menuDescription" rows="3" maxlength="1000" required></textarea>

        </div>

        <button type="submit" class="btn btn-primary">Add Menu</button>

    </form>

</div>



<!-- JavaScript -->

<script>

document.getElementById('menuForm').addEventListener('submit', function(e){

    e.preventDefault();



    let menuName = document.getElementById('menuName').value;

    let menuDescription = document.getElementById('menuDescription').value;



    // Submit data via Fetch API

    fetch('addMenu.php', {

        method: 'POST',

        body: JSON.stringify({ menuName, menuDescription }),

        headers: {'Content-Type': 'application/json'}

    })

    .then(response => response.json())

    .then(data => {

        if(data.success){

            Swal.fire('Success', 'Menu added successfully!', 'success');

        } else {

            Swal.fire('Error', 'There was an error adding the menu.', 'error');

        }

    })

    .catch(error => {

        Swal.fire('Error', 'There was an error adding the menu.', 'error');

    });

});

</script>