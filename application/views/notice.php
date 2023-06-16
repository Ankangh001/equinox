<?php
// echo "<pre>";
// print_r($announcements);
// exit;

$this->load->view('includes/header');
?>

<main id="main">
    <!-- ======= Why Us Section ======= -->
    <section style="margin: 6rem auto 0 auto;padding-bottom: 0;">
        <div class="container" data-aos="fade-up">
            <div class="section-title text-center">
                <h2>Trading Updates</h2>
                <p class="d-block border-bottom pb-3"><?= @$announcements[0]['content'] ?></p>
                
                <p class="d-block border-bottom pb-3">
                <?php 
                if(substr(@$announcements[0]['created_at'],8,-8) == "01"){
                    echo "1st ".date('F Y', strtotime(str_replace('-','',@$announcements[0]['created_at'])));
                }elseif (substr(@$announcements[0]['created_at'],8,-8) == "02") {
                    echo "2nd ".date('F Y', strtotime(str_replace('-','',@$announcements[0]['created_at'])));
                }elseif (substr(@$announcements[0]['created_at'],8,-8) == "03") {
                    echo "3rd ".date('F Y', strtotime(str_replace('-','',@$announcements[0]['created_at'])));
                }else{
                    echo substr(@$announcements[0]['created_at'],8,-8).date('F Y', strtotime(str_replace('-','',@$announcements[0]['created_at'])));
                }
                ?>
                </p>
            </div>
            <div class="pt-5 pb-3">
                <h2 class="text-dark fw-bold fs-3">Previous Trading Updates</h2>
            </div>
            <div class="row">
                <?php foreach ($announcements as $key => $value) {  if ($key > 0){?>
                    <div class="col-lg-4 col-sm-6 mb-5">
                        <a href="client-login">
                            <div class="card text-dark" data-aos="fade-up" data-aos-delay='100'>
                                <div class="card-body">
                                    <div class="header text-center py-1">
                                    <?php 
                                        if(substr(@$value['created_at'],8,-8) == "01"){
                                        echo "1st ".date('F Y', strtotime(str_replace('-','',@$value['created_at'])));
                                        }elseif (substr(@$value['created_at'],8,-8) == "02") {
                                        echo "2nd ".date('F Y', strtotime(str_replace('-','',@$value['created_at'])));
                                        }elseif (substr(@$value['created_at'],8,-8) == "03") {
                                        echo "3rd ".date('F Y', strtotime(str_replace('-','',@$value['created_at'])));
                                        }else{
                                        echo substr(@$value['created_at'],8,-8).date('F Y', strtotime(str_replace('-','',@$value['created_at'])));
                                        }
                                        ?>
                                    </div>
                                    <p class="mt-3" style="font-size:14px"><?= @$value['content'] ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } }?>
            </div>
        </div>
    </section><!-- End Pricing -->
</main><!-- End #main -->
<?php
$this->load->view('includes/footer');
?>