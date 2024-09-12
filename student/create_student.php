<?php require_once "./header.php"; ?>

<div class="form-student">
    <form action="./store.php" method="POST" enctype="multipart/form-data">
       

        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" placeholder="First Name" required/>

        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" placeholder="Last Name" required/>

        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" placeholder="Phone" required/>

        <label for="image">Image</label>
        <input type="file" id="image" name="image" required/>

        <button type="submit">Add Student</button>
    </form>
</div>

<?php require_once "./footer.php"; ?>





