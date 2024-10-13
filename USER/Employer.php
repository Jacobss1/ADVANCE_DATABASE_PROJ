<?php

require_once 'Employer.class.php';
require_once 'fetchJobs.php';

function fetchJobTypes() {
    $db_con = (new DBConnection())->connect();
    $sql = "SELECT id, type_name FROM job_types";
    $result = $db_con->query($sql);

    $jobTypes = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $jobTypes[] = $row;
        }
    }
    return $jobTypes;
}

$jobTypes = fetchJobTypes();  // Store the fetched job types
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUICKTASK</title>
    <link rel="icon" href="assets/ICON.png" type="image/x-icon"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="employer.css">
</head>
<body>
        <div class="container">
            <div class="tab_box"> 
                <button class="tab_btn active">DASHBOARD</button>
                <button class="tab_btn">POST A JOB</button>
                <button class="tab_btn">Testimonials</button>
                
              
               
                <button class="tab_btn">Contact us</button>
                <div class="line">

                </div>

            </div>
            <div class="content-box">
                <div class="content active ">
                    
                    <h5>JOBS POSTED:</h5>
                    <?php if (empty($jobs)) : ?>
            <div class="no-books">NO JOBS AVAILABLE.</div>
        <?php else : ?>
                 
                <table class="modern-table">
            <thead>
                <tr>
                    <th>Job Description</th>
                    <th>Offer</th>
                    <th>Job Type</th>
                    <th>Contract</th>
                    <th>Contact No.</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php foreach ($jobs as $jobDetails) : ?>
                        <tr>
                        <td><?php echo htmlspecialchars($jobDetails['jobDesc']); ?></td>
                            <td><?php echo htmlspecialchars($jobDetails['offer']); ?></td>
                            <td><?php echo htmlspecialchars($jobDetails['jobTypeId']); ?></td>
                            <td><?php echo htmlspecialchars($jobDetails['Contract']); ?></td>
                            <td><?php echo htmlspecialchars($jobDetails['contactNo']); ?></td>
                </tr>
              
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>


                </div>
                <div class="content " id="c1">
                   <form action="Employer.php" method="POST" class="jobForm" enctype="multipart/form-data">
                    <div class="job-content">
                        <label for="jobDesc">Job Description</label>
                        <textarea name="jobDesc" id="jobDesc"<?php echo htmlspecialchars( $jobDesc); ?>></textarea>
                        <?php if(!empty($jobDescErr)) echo"<br> <span class = 'error'>$jobDescErr</span>"; ?>

                    </div>

                    <div class="job-content">
                        <label for="offer">Offer</label>
                        <input type="text" name="offer" id="offer"  value="<?php echo htmlspecialchars( $offer);?>">
                        <?php if(!empty($offerErr)) echo"<br> <span class = 'error'>$offerErr</span>"; ?>


                    </div>
                    <div class="job-content">
    <label for="jobTypeId">Job Type</label>
    <select name="jobType" id="jobTypeId">
        <option value="">-- Select Job Type --</option>
        <?php foreach ($jobTypes as $jobType): ?>
            <option value="<?php echo htmlspecialchars($jobType['type_name']); ?>" 
                <?php if ($jobType['type_name'] == $jobType) echo 'selected'; ?>>
                <?php echo htmlspecialchars($jobType['type_name']); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <?php if(!empty($jobTypeErr)) echo "<br> <span class='error'>$jobTypeErr</span>"; ?>
</div>
                    <div class="job-content">
                        <label for="Contract">Contract</label>
                        <input type="text" name="Contract" id="Contract" value ="<?php echo htmlspecialchars($Contract);?>" >
                        <?php if(!empty($ContractErr)) echo"<br> <span class = 'error'>$ContractErr</span>"; ?>

                    </div>
                    <div class="job-content">
                        <label for="contactNo">Contact No.</label>
                        <input type="text" name="contactNo" id="contactNo" value="<?php echo htmlspecialchars( $contactNo); ?>">
                        <?php if(!empty($contactNoErr)) echo"<br> <span class = 'error'>$contactNoErr</span>"; ?>
                        <label for="image">Upload Job Image:</label>
                       <input type="file" name="image" id="image" required>
    
                  

                    </div>
                   
                   
                    <br>
                  
                    <button type="submit" class="submit-btn">POST</button>
        <?php if (!empty($successMessage)) : ?>
            <div class="message success"><?php echo htmlspecialchars($successMessage); ?></div>
        <?php endif; ?>
        <?php if (!empty($errMessage)) : ?>
            <div class="message error"><?php echo htmlspecialchars($errMessage); ?></div>
        <?php endif; ?>
                      
                    
                   </form>
                    
                </div>
                <div class="content" id="c2">
                    <h2>Products</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore eos nisi deserunt ducimus esse, quisquam neque nostrum culpa veniam laboriosam quos nesciunt magnam enim vero molestiae quod exercitationem! Harum, aspernatur.</p>
                    
                </div>
                <div class="content" id="c3">
                    <h2>Contact us</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore eos nisi deserunt ducimus esse, quisquam neque nostrum culpa veniam laboriosam quos nesciunt magnam enim vero molestiae quod exercitationem! Harum, aspernatur.</p>
                    
                </div>
            </div>
        </div>
            <script>
                const tabs=document.querySelectorAll(".tab_btn");
                const all_content=document.querySelectorAll(".content");


                tabs.forEach((tab,index)=>{
                    tab.addEventListener(`click`,(e)=>{
                        tabs.forEach(tab=>{tab.classList.remove(`active`)});
                        tab.classList.add(`active`);
                        var line=document.querySelector(`.line`);
                    line.style.width= e.target.offsetWidth +"px";
                    line.style.left= e.target.offsetLeft +"px";
                    all_content.forEach(content=>{content.classList.remove(`active`)});
                    all_content[index].classList.add(`active`);

                    });
                

                });

            </script>
    </body>
</html>