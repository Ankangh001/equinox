<?php
// echo "<pre>";
// echo (substr($res[0]['phase3_issue_date'], 0, 10));
// // print_r($res);
// die;

$this->load->view('user/includes/header');
?>
<style>
     @import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800');
        body {
            font-family: 'Open Sans', sans-serif;
        }
        
        a:hover {
            text-decoration: none;
        }
        
        .np {
            padding: 0px;
        }
        
        .featuredPropBox {}
        
        .featuredPropBox ul {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            list-style: outside none none;
            padding: 0;
        }
        
        .featuredPropBox ul li {
            background-color: #eeeeee;
            background-size: cover;
            background-position: 50% 50%;
            background-repeat: no-repeat;
            display: block;
            height: 250px;
            margin: 5px;
            width: 32%;
            position: relative;
            transition: all 0.3s;
            cursor: pointer;
        }
        
        .featuredPropBox ul li:after {
            position: absolute;
            content: "";
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            background-color: rgba(22, 22, 22, 0.6);
            transition: all 0.3s;
        }
        
        .featuredPropBox ul li:nth-child(1) {
            background-image: url('<?=base_url('assets/img')?>/crt.jpg');
        }
        
        .featuredPropBox ul li:nth-child(2) {
            background-image: url('https://i.ibb.co/pzGysVS/b.jpg');
        }
        
        .featuredPropBox ul li:nth-child(3) {
            background-image: url('https://i.ibb.co/QMrtWT1/c.jpg');
        }

 .featuredPropBox ul li:nth-child(4) {
            background-image: url('https://i.ibb.co/DL5pvY6/bg-1-2.jpg');
        }

 .featuredPropBox ul li:nth-child(5) {
            background-image: url('https://i.ibb.co/FWV1BJG/bg-1.jpg');
        }
 .featuredPropBox ul li:nth-child(6) {
            background-image: url('https://i.ibb.co/ZXmWmSZ/14.jpg');
        }

 .featuredPropBox ul li:nth-child(7) {
            background-image: url('https://i.ibb.co/hLcmWbT/15646.jpg');
        }

 .featuredPropBox ul li:nth-child(8) {
            background-image: url('https://i.ibb.co/89P5rTs/15678.jpg');
        }

 .featuredPropBox ul li:nth-child(9) {
            background-image: url('https://i.ibb.co/RhZgpSG/20845.jpg');
        }
        
        .featuredPropBox ul li .fplogo {
            left: 50%;
            position: absolute;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 60%;
            z-index: 1;
            transition: all 0.3s;
        }
        
        .featuredPropBox ul li .fplogo img {
            width: 100%;
        }
        
        .featuredPropBox ul li .fptext {
            display: none;
            font-size: 16px;
            left: 50%;
            position: absolute;
            text-align: center;
            top: 50%;
            transform: translate(-50%, -50%);
            transition: all 0.3s ease 0s;
            width: 65%;
            z-index: 1;
        }
        
        .featuredPropBox ul li .fptext p {
            color: #fff;
            margin: 0px;
        }
        
        .featuredPropBox ul li:hover {
            box-shadow: 0 0 0 25px rgba(0, 0, 0, 0.2) inset;
        }
        
        .featuredPropBox ul li:hover:after {
            background-color: rgba(22, 22, 22, 0.3);
        }
        
        .featuredPropBox ul li:hover .fplogo {
            display: none;
        }
        
        .featuredPropBox ul li:hover .fptext {
            display: block;
        }
</style>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="container">
   <div class="row">
    <div class="col-lg-12">
       <div class="featuredPropBox">
         <!-- <button id="submitBtn">Get Certificate</button>
         <iframe src="" id="pdf" width="500" height="600" frameborder="0"></iframe> -->
         <?php if($res){?>
         <div class="card-title  text-center fw-bold mt-5">
            Funded Account Certificate
        </div>
         <ul>
           <li> 
             <a href="#">
               <div class="fplogo"><img src="<?=base_url('assets/img')?>/equinoxLogo.png" alt="fp1"></div>
               <div class="fptext">
                  <input type="hidden" name="Name" autocomplete="name" id="name" value="<?= @$res[0]['first_name'] .' '.@$res[0]['last_name'] ?>" >
                  <button class="btn btn-info" id="submitBtn"><i class="bx bx-download"></i>&nbsp;&nbsp;Download</button>
                </div>
              </a>
            </li>
         </ul>
         <?php }else{ ?>
            <div class="row">
                <span class="badge bg-label-warning mx-auto my-5 fs-5 col-lg-6" style="text-transform : none">
                You Need to have atleast one Funded Account.
                </span>
            </div>
         <?php }?>
      </div>
     </div>
  </div>
 </div>
    <!-- / Content -->

    <script src="https://unpkg.com/pdf-lib@1.4.0"></script>
    <script src="<?=base_url('assets/js/FileSaver.js')?>"></script>
    <script src="https://unpkg.com/@pdf-lib/fontkit@0.0.4"></script>
  <script>
    $('#navbar-collapse').prepend(`<h4 class="fw-bold mb-0"><span class="text-muted fw-light">User /</span> Certificates</h4>`);

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
                "Certificate.pdf",
                {
                    type: "application/pdf;charset=utf-8",
                }
            );
            saveAs(file);
        };

// init();
</script>

<?php $this->load->view('user/includes/footer');?>