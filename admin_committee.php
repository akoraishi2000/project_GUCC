<?php
    // Connect to the MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gucc";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin_committee.css">
    <title>Document</title>
</head>
<body>
<div class="head">
        <p>EXECUTIVE COMMITTEE</p>
    </div>
    <div class="profile-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="tab-content p-0">
                    <div class="tab-pane fade active show" id="profile-followers">
                        <div class="list-group">'


                        <?php
                        // Query the database to fetch the committee members
                        $sql = "SELECT * FROM committee";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // Loop through each row of data
                            while ($row = $result->fetch_assoc()) {
                                $name = strtoupper($row["Name"]);
                                $designation = strtoupper($row["Designation"]);
                                $photo = $row["Photo"];
                                $C_ID = $row["C_ID"];

                                echo '<div class="list-group-item d-flex align-items-center">
                                    <img src="data:image/jpeg;base64,' . base64_encode($photo) . '" alt="" width="50px" class="rounded-sm ml-n2" />
                                    <div class="flex-fill pl-3 pr-3">
                                        <div><b><a href="admin_committee_profile_edit.php?C_ID=' . $C_ID . ' class="text-dark font-weight-600">' . $name . '</a></b></div>
                                        <div class="text-muted fs-13px">'. $designation .'</div>
                                    </div>
                                    <a href="admin_committee_profile_edit.php?C_ID=' . $C_ID . '" class="btn btn-outline-primary">EDIT</a>
                                </div>';
                            }
                        } else {
                                echo "No committee members found.";
                            }

                            // Close the database connection
                            $conn->close();
?>
                            <div class="list-group-item d-flex align-items-center">
                                <img src="/bootstrap table/deputy_moderator_td.png" alt="" width="50px" class="rounded-sm ml-n2" />
                                <div class="flex-fill pl-3 pr-3">
                                    <div><a href="#" class="text-dark font-weight-600">TANOY DEBNATH</a></div>
                                    <div class="text-muted fs-13px">DEPUTY MODERATOR</div>
                                </div>
                                <a href="admin_committee_profile_edit.php" class="btn btn-outline-primary">EDIT</a>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <img src="/bootstrap table/deputy_moderator_arr.png" alt="" width="50px" class="rounded-sm ml-n2" />
                                <div class="flex-fill pl-3 pr-3">
                                    <div><a href="#" class="text-dark font-weight-600">MD ABU RUMMAN REFAT</a></div>
                                    <div class="text-muted fs-13px">DEPUTY MODERATOR</div>
                                </div>
                                <a href="admin_committee_profile_edit.php" class="btn btn-outline-primary">EDIT</a>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <img src="/bootstrap table/president.jpg" alt="" width="50px" class="rounded-sm ml-n2" />
                                <div class="flex-fill pl-3 pr-3">
                                    <div><a href="#" class="text-dark font-weight-600">MD. IQBAL JAHAN</a></div>
                                    <div class="text-muted fs-13px">PRESIDENT</div>
                                </div>
                                <a href="admin_committee_profile_edit.php" class="btn btn-outline-primary">EDIT</a>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="" width="50px" class="rounded-sm ml-n2" />
                                <div class="flex-fill pl-3 pr-3">
                                    <div><a href="#" class="text-dark font-weight-600">MD JAHIDUL HASAN</a></div>
                                    <div class="text-muted fs-13px">VICE PRESIDENT</div>
                                </div>
                                <a href="#" class="btn btn-outline-primary">EDIT</a>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="" width="50px" class="rounded-sm ml-n2" />
                                <div class="flex-fill pl-3 pr-3">
                                    <div><a href="#" class="text-dark font-weight-600">MD RAHUL REZA</a></div>
                                    <div class="text-muted fs-13px">GENERAL SECRETARY</div>
                                </div>
                                <a href="#" class="btn btn-outline-primary">EDIT</a>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" width="50px" class="rounded-sm ml-n2" />
                                <div class="flex-fill pl-3 pr-3">
                                    <div><a href="#" class="text-dark font-weight-600">MD MOHTAMIM ISLAM NAYEEM</a></div>
                                    <div class="text-muted fs-13px">JOINT GENERAL SECRETARY</div>
                                </div>
                                <a href="#" class="btn btn-outline-primary">EDIT</a>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="" width="50px" class="rounded-sm ml-n2" />
                                <div class="flex-fill pl-3 pr-3">
                                    <div><a href="#" class="text-dark font-weight-600">KAMRUJJAMAN SHAMIM</a></div>
                                    <div class="text-muted fs-13px">TREASURER</div>
                                </div>
                                <a href="#" class="btn btn-outline-primary">EDIT</a>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" width="50px" class="rounded-sm ml-n2" />
                                <div class="flex-fill pl-3 pr-3">
                                    <div><a href="#" class="text-dark font-weight-600">MD JAHID HASAN</a></div>
                                    <div class="text-muted fs-13px">JOINT TREASURER</div>
                                </div>
                                <a href="#" class="btn btn-outline-primary">EDIT</a>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" width="50px" class="rounded-sm ml-n2" />
                                <div class="flex-fill pl-3 pr-3">
                                    <div><a href="#" class="text-dark font-weight-600">MAHSHIAT TAHSIN BABLY</a></div>
                                    <div class="text-muted fs-13px">ORGANIZING SECRETARY</div>
                                </div>
                                <a href="#" class="btn btn-outline-primary">EDIT</a>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" width="50px" class="rounded-sm ml-n2" />
                                <div class="flex-fill pl-3 pr-3">
                                    <div><a href="#" class="text-dark font-weight-600">SAKHAWAT HOSSAIN RABBI</a></div>
                                    <div class="text-muted fs-13px">JOINT ORGANIZING SECRETARY</div>
                                </div>
                                <a href="#" class="btn btn-outline-primary">EDIT</a>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" width="50px" class="rounded-sm ml-n2" />
                                <div class="flex-fill pl-3 pr-3">
                                    <div><a href="#" class="text-dark font-weight-600">MONTASIR CHOWDHURY MREDULL</a></div>
                                    <div class="text-muted fs-13px">PROGRAMMING SECRETARY</div>
                                </div>
                                <a href="#" class="btn btn-outline-primary">EDIT</a>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" width="50px" class="rounded-sm ml-n2" />
                                <div class="flex-fill pl-3 pr-3">
                                    <div><a href="#" class="text-dark font-weight-600">SHAHRIAR AHSAN TAISIQ</a></div>
                                    <div class="text-muted fs-13px">INFORMATION SECRETARY</div>
                                </div>
                                <a href="#" class="btn btn-outline-primary">EDIT</a>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" width="50px" class="rounded-sm ml-n2" />
                                <div class="flex-fill pl-3 pr-3">
                                    <div><a href="#" class="text-dark font-weight-600">MD MONTASIR RAHMAN</a></div>
                                    <div class="text-muted fs-13px">JOINT INFORMATION SECRETARY</div>
                                </div>
                                <a href="#" class="btn btn-outline-primary">EDIT</a>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" width="50px" class="rounded-sm ml-n2" />
                                <div class="flex-fill pl-3 pr-3">
                                    <div><a href="#" class="text-dark font-weight-600">SABRINA RAHMAN</a></div>
                                    <div class="text-muted fs-13px">CULTURAL SECRETARY</div>
                                </div>
                                <a href="#" class="btn btn-outline-primary">EDIT</a>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" width="50px" class="rounded-sm ml-n2" />
                                <div class="flex-fill pl-3 pr-3">
                                    <div><a href="#" class="text-dark font-weight-600">ASMAUL HUSNA</a></div>
                                    <div class="text-muted fs-13px">JOINT CULTURAL SECRETARY</div>
                                </div>
                                <a href="#" class="btn btn-outline-primary">EDIT</a>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" width="50px" class="rounded-sm ml-n2" />
                                <div class="flex-fill pl-3 pr-3">
                                    <div><a href="#" class="text-dark font-weight-600">MD KHYRUDDIN</a></div>
                                    <div class="text-muted fs-13px">GRAPHIC DESIGNER</div>
                                </div>
                                <a href="#" class="btn btn-outline-primary">EDIT</a>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" width="50px" class="rounded-sm ml-n2" />
                                <div class="flex-fill pl-3 pr-3">
                                    <div><a href="#" class="text-dark font-weight-600">ISMAIL HOSSAIN</a></div>
                                    <div class="text-muted fs-13px">SPORTS SECRETARY</div>
                                </div>
                                <a href="#" class="btn btn-outline-primary">EDIT</a>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" width="50px" class="rounded-sm ml-n2" />
                                <div class="flex-fill pl-3 pr-3">
                                    <div><a href="#" class="text-dark font-weight-600">TAMIM AHMED</a></div>
                                    <div class="text-muted fs-13px">JOINT SPORTS SECRETARY</div>
                                </div>
                                <a href="#" class="btn btn-outline-primary">EDIT</a>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" width="50px" class="rounded-sm ml-n2" />
                                <div class="flex-fill pl-3 pr-3">
                                    <div><a href="#" class="text-dark font-weight-600">MD RAFIQUL ISLAM</a></div>
                                    <div class="text-muted fs-13px">PUBLICATION SECRETARY</div>
                                </div>
                                <a href="#" class="btn btn-outline-primary">EDIT</a>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" width="50px" class="rounded-sm ml-n2" />
                                <div class="flex-fill pl-3 pr-3">
                                    <div><a href="#" class="text-dark font-weight-600">MAHIBULLAH</a></div>
                                    <div class="text-muted fs-13px">JOINT PUBLICATION SECRETARY</div>
                                </div>
                                <a href="#" class="btn btn-outline-primary">EDIT</a>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" width="50px" class="rounded-sm ml-n2" />
                                <div class="flex-fill pl-3 pr-3">
                                    <div><a href="#" class="text-dark font-weight-600">RASHADUL HASAN ROMMAN</a></div>
                                    <div class="text-muted fs-13px">OFFICE SECRETARY</div>
                                </div>
                                <a href="#" class="btn btn-outline-primary">EDIT</a>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
        

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript"></script>
</body>
</html>'
?>