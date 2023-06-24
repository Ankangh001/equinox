<?php
// echo "<pre>";
// echo (substr($res[0]['phase3_issue_date'], 0, 10));
// print_r($certificates);
// print_r($certificates[0]['amount'].$certificates[0]['payout_date'].$_SESSION['user_name']);
// die;

$this->load->view('user/includes/header');
?>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card-title fs-3 text-center fw-bold mt-5">
        Funded Account Certificate
    </div>
    <div class="row mb-5">
        <div class="col-2"></div>
        <div class="col-md-6 m-auto">
            <?php if($res){?>
                <img class="card-img" src="<?=base_url('assets/img')?>/crt.jpg" alt="image">
                <input type="hidden" name="Name" autocomplete="name" id="name" value="<?= @$res[0]['first_name'] .' '.@$res[0]['last_name'] ?>" >

                <button id="submitBtn" class="mt-3 w-100 fw-bold pointer btn btn-primary p-2"><i class='bx bx-download fs-3' ></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D O W N L O A D</button>
            <?php }else{ ?>
                <div class="row">
                    <span class="card badge bg-label-warning mx-auto my-5 fs-3" style="text-transform : none;white-space: normal;line-height: 3rem;">
                        You Need to have atleast one Funded Account.
                    </span>
                </div>
            <?php }?>
        </div>
        <div class="col-2"></div>
        <?php 
            if($certificates){?>
                <div class="card-title fs-3 text-center fw-bold mt-5">
                    Payout Certificates
                </div>
        <?php foreach ($certificates as $key => $value) { ?>
        <div class="col-md-4 m-auto">
                <img class="card-img" src="<?=base_url('assets/img')?>/pcrt.png" alt="image">
                <button onclick="generatePayoutPDF('<?= $_SESSION['user_name'] ?>', '$<?= $value['amount'] ?>','<?= substr($value['payout_date'], 0, 10) ?>')"
                class="mt-3 w-100 pointer fw-bold btn btn-primary p-2"><i class='bx bx-download fs-3' ></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D O W N L O A D</button>
        <?php 
                }
            }
        ?>
        </div>
      </div>
    </div>
  </div>
    <!-- / Content -->
    <?php $this->load->view('user/includes/footer');?>

<script src="https://unpkg.com/pdf-lib@1.4.0"></script>
<script src="<?=base_url('assets/js/FileSaver.js')?>"></script>
<script src="https://unpkg.com/@pdf-lib/fontkit@0.0.4"></script>
<script>
    $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light"></span> Certificates</h4>`);

    const userName = document.getElementById("name");
    const submitBtn = document.getElementById("submitBtn");

    const { PDFDocument, rgb, degrees } = PDFLib;


    const capitalize = (str, lower = false) =>
        (lower ? str.toLowerCase() : str).replace(/(?:^|\s|["'([{])+\S/g, (match) =>
            match.toUpperCase()
        );

    submitBtn.addEventListener("click", () => {
        const val = capitalize(userName.value);

        //check if the text is empty or not
        if (val.trim() !== "" && userName.checkValidity()) {
            // console.log(val);
            generatePDF(val);
        } else {
            userName.reportValidity();
        }
    });

    const generatePDF = async (name, date="<?= substr($res[0]['phase3_issue_date'], 0, 10) ?>") => {
        const existingPdfBytes = await fetch("<?=base_url('assets/certificates')?>/funded_cert.pdf").then((res) =>
            res.arrayBuffer()
        );

        // Load a PDFDocument from the existing PDF bytes
        const pdfDoc = await PDFDocument.load(existingPdfBytes);
        pdfDoc.registerFontkit(fontkit);

        //get font
        const fontBytes = await fetch("<?=base_url('assets/certificates')?>/Sanchez-Regular.ttf").then((res) =>
            res.arrayBuffer()
        );

        // Embed our custom font in the document
        const SanChezFont = await pdfDoc.embedFont(fontBytes);

        // Get the first page of the document
        const pages = pdfDoc.getPages();
        const firstPage = pages[0];

        // Draw a string of text diagonally across the first page
        firstPage.drawText(name, {
            x: 650,
            y: 375,
            size: 26,
            font: SanChezFont,
            color: rgb(0, 0, 0),
        });

        firstPage.drawText(date, {
            x: 700,
            y: 187,
            size: 12,
            font: SanChezFont,
            color: rgb(0, 0, 0),
        });

        // Serialize the PDFDocument to bytes (a Uint8Array)
        const pdfBytes = await pdfDoc.save();
        console.log("Done creating");

        // this was for creating uri and showing in iframe

        // const pdfDataUri = await pdfDoc.saveAsBase64({ dataUri: true });
        // document.getElementById("pdf").src = pdfDataUri;

        var file = new File(
            [pdfBytes],
            "Funded Certificate.pdf",
            {
                type: "application/pdf;charset=utf-8",
            }
        );
        saveAs(file);
    };


    const generatePayoutPDF = async (fname, amount, pDate) => {
        var name = capitalize(fname);
        const existingPdfBytes = await fetch("<?=base_url('assets/certificates')?>/payout_cert.pdf").then((res) =>
            res.arrayBuffer()
        );

        // Load a PDFDocument from the existing PDF bytes
        const pdfDoc = await PDFDocument.load(existingPdfBytes);
        pdfDoc.registerFontkit(fontkit);

        //get font
        const fontBytes = await fetch("<?=base_url('assets/certificates')?>/Sanchez-Regular.ttf").then((res) =>
            res.arrayBuffer()
        );

        // Embed our custom font in the document
        const SanChezFont = await pdfDoc.embedFont(fontBytes);

        // Get the first page of the document
        const pages = pdfDoc.getPages();
        const firstPage = pages[0];

        // Draw a string of text diagonally across the first page
        firstPage.drawText(name, {
            x: 650,
            y: 428,
            size: 26,
            font: SanChezFont,
            color: rgb(0, 0, 0),
        });

        firstPage.drawText(amount, {
            x: 700,
            y: 343,
            size: 18,
            font: SanChezFont,
            color: rgb(0, 0, 0),
        });

        firstPage.drawText(pDate, {
            x: 700,
            y: 187,
            size: 12,
            font: SanChezFont,
            color: rgb(0, 0, 0),
        });

        // Serialize the PDFDocument to bytes (a Uint8Array)
        const pdfBytes = await pdfDoc.save();
        console.log("Done creating");

        // this was for creating uri and showing in iframe

        // const pdfDataUri = await pdfDoc.saveAsBase64({ dataUri: true });
        // document.getElementById("pdf").src = pdfDataUri;

        var file = new File(
            [pdfBytes],
            "Payout Certificate.pdf",
            {
                type: "application/pdf;charset=utf-8",
            }
        );
        saveAs(file);
    };


    $.ajax({
      type: "GET",
      url: "<?php echo base_url('user/certificates/getPayoutCertificates'); ?>",
      dataType: "html",
      success: function(data){
        let res = JSON.parse(data);
        console.log(res);                
        if(data.status == 200){
            data.data.forEach(element => {
            });
        }
      },
      error: function(){

      }
    })
</script>
