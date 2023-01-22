<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    @media print {

        .hidden-print,
        .hidden-print * {
            display: none !important;
        }

        .hidden-back,
        .hidden-back * {
            display: none !important;
        }
    }

    h1 {
        font-family: Times New Roman;
        font-weight: bold;
    }
    
    h5, p {
        font-family: Times New Roman;
    }
</style>
<div id="printable" class="container">
    <div class="container">
        <div class="header" style="margin-top: 40px;">
            <h1 class="text-center">Praktik Umum dr. Alfi Yudisianto</h1>
            <h5 class="text-center">No.SIP. 503/A.1/0190 DU/35.09.325/2022  <br>Jl. Srikaya no.88 Jember
                <br> Pagi 07.00-10.00 <br> Sore 17.00-20.00
            </h5>
        </div>
        <div class="row" style="margin-top: 40px;">
            <div class="col">
                <p style="font-weight: bold; margin-left: 25%;">KARTU IDENTITAS BEROBAT</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p style="margin-left: 25%;">NO. RM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?= $view->no_rm ?></p>
                <p style="margin-left: 25%;">NAMA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?= $view->nama_lengkap ?></p>
                <p style="margin-left: 25%;">ALAMAT &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?= $view->alamat ?></p>
                <p style="margin-left: 25%;">PASSWORD &nbsp;&nbsp;&nbsp;&nbsp; : <?= $view->password_view ?></p>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <button id="btnPrint" class="hidden-print">Cetak</button>
    <a href="<?= base_url('Loket/pasien') ?>" class="hidden-back">Kembali</a>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    // $('body').on('click', function() {
    //     //pop_print('printable');
    //     window.open(document.URL, 'printer');
    // });

    // function pop_print(id) {
    //     w = window.open('', 'Print_Page', 'scrollbars=yes');
    //     var myStyle = '<link rel="stylesheet" href="https://codepen.io/dimaslanjaka/pen/mozZPX.css?ver=' + window.btoa(Math.random()) + '" /><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css" media="all" />';
    //     w.document.write(myStyle + $('#' + id).html());
    //     w.document.close();
    //     w.print();
    //     w.close();
    // }

    var css = '@page { size: landscape; }',
    head = document.head || document.getElementsByTagName('head')[0],
    style = document.createElement('style');

    style.type = 'text/css';
    style.media = 'print';

    if (style.styleSheet){
    style.styleSheet.cssText = css;
    } else {
    style.appendChild(document.createTextNode(css));
    }

    head.appendChild(style);
        const $btnPrint = document.querySelector("#btnPrint");
        $btnPrint.addEventListener("click", () => {
            window.print();
        });
</script>