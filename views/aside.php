<?php 
  if (!isset($_SESSION['id_dokter'])){
    $_SESSION['id_dokter'] = NULL;
  }

  if (!isset($_SESSION['role'])) {
    $_SESSION['role'] = NULL;
  }

  if (!isset($_SESSION['id_owner'])) {
    $_SESSION['id_owner'] = NULL;
  }

 ?>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo text-center mb-2">
            <a href="index.php" class="app-brand-link">
              <span class="app-brand-logo demo text-center">
                <img src="../assets/img/easydoc3.png" style="width: 200px">
              </span>
              <!-- <span class="app-brand-text demo menu-text fw-bolder ms-2">easydoc</span> -->
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
          <?php if ($_SERVER['SCRIPT_NAME'] == '/views/index.php'): ?>
            <li class="menu-item active mt-2">
          <?php else: ?>
            <li class="menu-item mt-2">
          <?php endif ?>
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="dashboard">Dashboard</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clone" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="menu-icon svg-inline--fa fa-clone fa-w-16"><path fill="currentColor" d="M464 0c26.51 0 48 21.49 48 48v288c0 26.51-21.49 48-48 48H176c-26.51 0-48-21.49-48-48V48c0-26.51 21.49-48 48-48h288M176 416c-44.112 0-80-35.888-80-80V128H48c-26.51 0-48 21.49-48 48v288c0 26.51 21.49 48 48 48h288c26.51 0 48-21.49 48-48v-48H176z" class="menu-icon"></path></svg>
              <span class="menu-header-text">Pages</span>
            </li>
            <!-- Cards -->
<?php if ($_SESSION['id_owner']): ?>
            <li class="menu-item">
              <a href="pilih_klinik.php" class="menu-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48" class="menu-icon"><g fill="currentColor"><path fill-rule="evenodd" d="M13.02 11.985c.057-.71.242-1.384.531-2H6v2.481l4 3.03v26.52h28V15.531l4.5-3.03V9.984H24.449c.29.616.474 1.29.532 2h14.706L36 14.468v25.547H12V14.503l-3.324-2.518h4.343Z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M10 13.75L7.5 10.5h5.75L16.5 17H21l3.5-6.5H41l-3 4V41h-4V24h-8v17H10V13.75ZM14 24h7v7h-7v-7Z" clip-rule="evenodd"/><path d="M6 41a1 1 0 0 0 1 1h34a1 1 0 1 0 0-2H7a1 1 0 0 0-1 1Z"/><path fill-rule="evenodd" d="M25 12a6 6 0 1 1-12 0a6 6 0 0 1 12 0Zm-5-3v2h2v2h-2v2h-2v-2h-2v-2h2V9h2Z" clip-rule="evenodd"/></g></svg>
                <div data-i18n="klinik">Manajemen Klinik</div>
              </a>
            </li>
<?php endif ?>
<?php if ($_SESSION['id_owner'] OR $_SESSION['role'] == 'PIC Klinik' OR $_SESSION['role'] == 'Front Desk'): ?>
            <?php if ($_SERVER['SCRIPT_NAME'] == '/views/dokter_show.php' OR $_SERVER['SCRIPT_NAME'] == '/views/staff_show.php' OR $_SERVER['SCRIPT_NAME'] == '/views/dokter_tambah.php' OR $_SERVER['SCRIPT_NAME'] == '/views/staff_tambah.php' OR $_SERVER['SCRIPT_NAME'] == '/views/dokter_ubah.php' OR $_SERVER['SCRIPT_NAME'] == '/views/staff_ubah.php'): ?>
            <li class="menu-item active">
            <?php else: ?>
            <li class="menu-item">
            <?php endif ?>
              <a href="javascript:void(0)" class="menu-link menu-toggle">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 19.521" fill="currentColor" style="height: 20px;" class="menu-icon"><g transform="translate(4 0.5)"><circle cx="4.5" cy="4.5" r="3.5" stroke="currentColor" stroke-width="2" fill="none"></circle></g><g transform="translate(0 8)"><path d="M 8.5 2 C 4.925952911376953 2 2.016377449035645 4.899822235107422 2.000067710876465 8.470109939575195 C 2.089730262756348 8.616405487060547 2.567544937133789 9.043878555297852 3.827750205993652 9.423839569091797 C 5.104559898376465 9.808799743652344 6.763870239257813 10.0208101272583 8.5 10.0208101272583 C 10.23612976074219 10.0208101272583 11.89544010162354 9.808799743652344 13.17224979400635 9.423839569091797 C 14.43245506286621 9.043878555297852 14.91026878356934 8.616405487060547 14.99993133544922 8.470109939575195 C 14.98362159729004 4.899822235107422 12.07404708862305 2 8.5 2 M 8.5 0 C 13.19441986083984 0 17 3.805580139160156 17 8.5 C 17 10.84720993041992 12.75 12.02081489562988 8.5 12.02081489562988 C 4.25 12.02081489562988 0 10.84720993041992 0 8.5 C 0 3.805580139160156 3.805580139160156 0 8.5 0 Z" class="menu-icon">

              </path></g></svg>
                <div data-i18n="Setting Manajemen">Setting Manajemen</div>
              </a>
              <ul class="menu-sub">
                <?php if ($_SERVER['SCRIPT_NAME'] == '/views/dokter_show.php' OR $_SERVER['SCRIPT_NAME'] == '/views/dokter_tambah.php' OR $_SERVER['SCRIPT_NAME'] == '/views/dokter_ubah.php'): ?>
                <li class="menu-item active">
                <?php else: ?>
                <li class="menu-item">
                <?php endif ?>
                  <a href="dokter_show.php" class="menu-link">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25.5" height="22.965" viewBox="0 0 25.5 22.965" class="menu-icon"><g id="tambah_dokter_staff" data-name="tambah dokter &amp; staff" transform="translate(-50.5 -312.035)"><g id="Group_1150" data-name="Group 1150" transform="translate(50.5 311.535)"><g fill="none" stroke="currentColor" stroke-width="2" transform="translate(4 0.5)"><circle stroke="none" cx="4.5" cy="4.5" r="4.5"></circle><circle fill="none" cx="4.5" cy="4.5" r="3.5"></circle></g><g fill="none" transform="translate(0 8)"><path stroke="none" d="M8.5,0A8.5,8.5,0,0,1,17,8.5c0,4.694-17,4.694-17,0A8.5,8.5,0,0,1,8.5,0Z"></path><path fill="currentColor" stroke="none" d="M 8.5 2 C 4.925952911376953 2 2.016377449035645 4.899822235107422 2.000067710876465 8.470109939575195 C 2.089730262756348 8.616405487060547 2.567544937133789 9.043878555297852 3.827750205993652 9.423839569091797 C 5.104559898376465 9.808799743652344 6.763870239257813 10.0208101272583 8.5 10.0208101272583 C 10.23612976074219 10.0208101272583 11.89544010162354 9.808799743652344 13.17224979400635 9.423839569091797 C 14.43245506286621 9.043878555297852 14.91026878356934 8.616405487060547 14.99993133544922 8.470109939575195 C 14.98362159729004 4.899822235107422 12.07404708862305 2 8.5 2 M 8.5 0 C 13.19441986083984 0 17 3.805580139160156 17 8.5 C 17 10.84720993041992 12.75 12.02081489562988 8.5 12.02081489562988 C 4.25 12.02081489562988 0 10.84720993041992 0 8.5 C 0 3.805580139160156 3.805580139160156 0 8.5 0 Z"></path></g></g><g fill="none" transform="translate(62 321)"><rect stroke="currentColor" stroke-width="2" width="12" height="12" rx="6"></rect><rect fill="none" x="-1" y="-1" width="14" height="14" rx="7"></rect></g><path fill="currentColor" d="M17.069,19.165H14.845v2.224H12.3V19.165H10.08V16.624H12.3V14.4h2.541v2.224h2.224Z" transform="translate(54.596 309.275)" class="menu-icon"></path></g></svg>
                    <div data-i18n="dokter">Dokter</div>
                  </a>
                </li>
              </ul>
              <ul class="menu-sub">
                <?php if ($_SERVER['SCRIPT_NAME'] == '/views/staff_show.php' OR $_SERVER['SCRIPT_NAME'] == '/views/staff_tambah.php' OR $_SERVER['SCRIPT_NAME'] == '/views/staff_ubah.php'): ?>
                <li class="menu-item active">
                <?php else: ?>
                <li class="menu-item">
                <?php endif ?>
                  <a href="staff_show.php" class="menu-link">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25.5" height="22.965" viewBox="0 0 25.5 22.965" class="menu-icon"><g id="tambah_dokter_staff" data-name="tambah dokter &amp; staff" transform="translate(-50.5 -312.035)"><g id="Group_1150" data-name="Group 1150" transform="translate(50.5 311.535)"><g fill="none" stroke="currentColor" stroke-width="2" transform="translate(4 0.5)"><circle stroke="none" cx="4.5" cy="4.5" r="4.5"></circle><circle fill="none" cx="4.5" cy="4.5" r="3.5"></circle></g><g fill="none" transform="translate(0 8)"><path stroke="none" d="M8.5,0A8.5,8.5,0,0,1,17,8.5c0,4.694-17,4.694-17,0A8.5,8.5,0,0,1,8.5,0Z"></path><path fill="currentColor" stroke="none" d="M 8.5 2 C 4.925952911376953 2 2.016377449035645 4.899822235107422 2.000067710876465 8.470109939575195 C 2.089730262756348 8.616405487060547 2.567544937133789 9.043878555297852 3.827750205993652 9.423839569091797 C 5.104559898376465 9.808799743652344 6.763870239257813 10.0208101272583 8.5 10.0208101272583 C 10.23612976074219 10.0208101272583 11.89544010162354 9.808799743652344 13.17224979400635 9.423839569091797 C 14.43245506286621 9.043878555297852 14.91026878356934 8.616405487060547 14.99993133544922 8.470109939575195 C 14.98362159729004 4.899822235107422 12.07404708862305 2 8.5 2 M 8.5 0 C 13.19441986083984 0 17 3.805580139160156 17 8.5 C 17 10.84720993041992 12.75 12.02081489562988 8.5 12.02081489562988 C 4.25 12.02081489562988 0 10.84720993041992 0 8.5 C 0 3.805580139160156 3.805580139160156 0 8.5 0 Z"></path></g></g><g fill="none" transform="translate(62 321)"><rect stroke="currentColor" stroke-width="2" width="12" height="12" rx="6"></rect><rect fill="none" x="-1" y="-1" width="14" height="14" rx="7"></rect></g><path fill="currentColor" d="M17.069,19.165H14.845v2.224H12.3V19.165H10.08V16.624H12.3V14.4h2.541v2.224h2.224Z" transform="translate(54.596 309.275)" class="menu-icon"></path></g></svg>
                    <div data-i18n="staff">Staff</div>
                  </a>
                </li>
              </ul>
            </li>
<?php endif ?>
<?php if ($_SESSION['role'] == 'PIC Klinik' OR $_SESSION['id_dokter'] OR $_SESSION['role'] == 'Apoteker' OR $_SESSION['role'] == 'Front Desk'): ?>         
            <?php if ($_SERVER['SCRIPT_NAME'] == '/views/poli_show.php' OR $_SERVER['SCRIPT_NAME'] == '/views/poli_tambah.php' OR $_SERVER['SCRIPT_NAME'] == '/views/poli_ubah.php'): ?>
            <li class="menu-item active">
            <?php else: ?>
            <li class="menu-item">
            <?php endif ?>
              <a href="poli_show.php" class="menu-link">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 421.536 500" fill="currentColor" style="height: 20px;" class="menu-icon"><path d="M77.108 0C34.835 0 0 34.835 0 77.108v345.783C0 465.165 34.835 500 77.108 500h267.319c42.273 0 77.108-34.835 77.108-77.108V77.108C421.536 34.835 386.701 0 344.428 0zm0 51.406h267.319c14.684 0 25.703 11.019 25.703 25.703v345.783c0 14.684-11.019 25.703-25.703 25.703H77.108c-14.684 0-25.703-11.019-25.703-25.703V77.108c0-14.684 11.019-25.703 25.703-25.703zm133.133 23.745a19.28 19.28 0 0 0-19.277 19.277v117.018a19.28 19.28 0 0 0 19.277 19.277 19.28 19.28 0 0 0 19.277-19.277V94.428a19.28 19.28 0 0 0-19.277-19.277z"></path><path d="M156.627 135.492a19.28 19.28 0 0 0-19.277 19.277 19.28 19.28 0 0 0 19.277 19.277H264.91a19.28 19.28 0 0 0 19.277-19.277 19.28 19.28 0 0 0-19.277-19.277z" class="menu-icon"></path><use xlink:href="#B"></use><use xlink:href="#B" y="90.612"></use><defs><path id="B" d="M96.084 258.183c-14.195 0-25.703 11.508-25.703 25.703s11.508 25.703 25.703 25.703h228.363c14.195 0 25.703-11.508 25.703-25.703s-11.508-25.703-25.703-25.703z"></path></defs></svg>
                <div data-i18n="Boxicons">Manajemen Poliklinik</div>
              </a>
            </li>
            <?php if ($_SERVER['SCRIPT_NAME'] == '/views/tarif_show.php' OR $_SERVER['SCRIPT_NAME'] == '/views/tarif_tambah.php' OR $_SERVER['SCRIPT_NAME'] == '/views/tarif_ubah.php'): ?>
            <li class="menu-item active">
            <?php else: ?>
            <li class="menu-item">
            <?php endif ?>
              <a href="tarif_show.php" class="menu-link">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="menu-icon"><path fill="currentColor" fill-rule="evenodd" d="M12.052 1.25h-.104c-.899 0-1.648 0-2.242.08c-.628.084-1.195.27-1.65.725c-.456.456-.642 1.023-.726 1.65c-.057.427-.074 1.446-.078 2.32c-2.022.067-3.237.303-4.08 1.147C2 8.343 2 10.229 2 14c0 3.771 0 5.657 1.172 6.828C4.343 22 6.229 22 10 22h4c3.771 0 5.657 0 6.828-1.172C22 19.657 22 17.771 22 14c0-3.771 0-5.657-1.172-6.828c-.843-.844-2.058-1.08-4.08-1.146c-.004-.875-.02-1.894-.078-2.32c-.084-.628-.27-1.195-.726-1.65c-.455-.456-1.022-.642-1.65-.726c-.594-.08-1.344-.08-2.242-.08Zm3.196 4.752c-.005-.847-.019-1.758-.064-2.097c-.063-.461-.17-.659-.3-.789c-.13-.13-.328-.237-.79-.3c-.482-.064-1.13-.066-2.094-.066s-1.612.002-2.095.067c-.461.062-.659.169-.789.3c-.13.13-.237.327-.3.788c-.045.34-.06 1.25-.064 2.097C9.143 6 9.56 6 10 6h4c.441 0 .857 0 1.248.002ZM12 9.25a.75.75 0 0 1 .75.75v.01c1.089.274 2 1.133 2 2.323a.75.75 0 0 1-1.5 0c0-.384-.426-.916-1.25-.916c-.824 0-1.25.532-1.25.916s.426.917 1.25.917c1.385 0 2.75.96 2.75 2.417c0 1.19-.911 2.048-2 2.323V18a.75.75 0 0 1-1.5 0v-.01c-1.089-.274-2-1.133-2-2.323a.75.75 0 0 1 1.5 0c0 .384.426.916 1.25.916c.824 0 1.25-.532 1.25-.916s-.426-.917-1.25-.917c-1.385 0-2.75-.96-2.75-2.417c0-1.19.911-2.049 2-2.323V10a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/></svg>
                <div data-i18n="tarif">Manajemen Tarif</div>
              </a>
            </li>
<?php endif ?>
<?php if ($_SESSION['role'] == 'PIC Klinik' OR $_SESSION['id_dokter'] OR $_SESSION['role'] == 'Apoteker' OR $_SESSION['role'] == 'Perawat'): ?>        
            <?php if ($_SERVER['SCRIPT_NAME'] == '/views/obat_show.php' OR $_SERVER['SCRIPT_NAME'] == '/views/bhp_show.php' OR $_SERVER['SCRIPT_NAME'] == '/views/obat_tambah.php' OR $_SERVER['SCRIPT_NAME'] == '/views/bhp_tambah.php' OR $_SERVER['SCRIPT_NAME'] == '/views/obat_ubah.php' OR $_SERVER['SCRIPT_NAME'] == '/views/bhp_ubah.php'): ?>
            <li class="menu-item active">
            <?php else: ?>
            <li class="menu-item">
            <?php endif ?>
              <a href="javascript:void(0)" class="menu-link menu-toggle">
              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-medical" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 421.536 500" class="menu-icon svg-inline--fa fa-file-medical fa-w-20" style="height: 20px;">
                <path fill="currentColor" d="M377 105L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1c0-6.3-2.5-12.4-7-16.9zm-153 31V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm64 160v48c0 4.4-3.6 8-8 8h-56v56c0 4.4-3.6 8-8 8h-48c-4.4 0-8-3.6-8-8v-56h-56c-4.4 0-8-3.6-8-8v-48c0-4.4 3.6-8 8-8h56v-56c0-4.4 3.6-8 8-8h48c4.4 0 8 3.6 8 8v56h56c4.4 0 8 3.6 8 8z" class="menu-icon">

                </path></svg>
                <div data-i18n="Basic">Manajemen Obat & BHP</div>
              </a>
              <ul class="menu-sub">
                <?php if ($_SERVER['SCRIPT_NAME'] == '/views/obat_show.php' OR $_SERVER['SCRIPT_NAME'] == '/views/obat_tambah.php' OR $_SERVER['SCRIPT_NAME'] == '/views/obat_ubah.php'): ?>
                <li class="menu-item active">
                <?php else: ?>
                <li class="menu-item">
                <?php endif ?>
                  <a href="obat_show.php" class="menu-link">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25.5" height="22.965" viewBox="0 0 25.5 22.965" class="menu-icon"><g id="tambah_dokter_staff" data-name="tambah dokter &amp; staff" transform="translate(-50.5 -312.035)"><g id="Group_1150" data-name="Group 1150" transform="translate(50.5 311.535)"><g fill="none" stroke="currentColor" stroke-width="2" transform="translate(4 0.5)"><circle stroke="none" cx="4.5" cy="4.5" r="4.5"></circle><circle fill="none" cx="4.5" cy="4.5" r="3.5"></circle></g><g fill="none" transform="translate(0 8)"><path stroke="none" d="M8.5,0A8.5,8.5,0,0,1,17,8.5c0,4.694-17,4.694-17,0A8.5,8.5,0,0,1,8.5,0Z"></path><path fill="currentColor" stroke="none" d="M 8.5 2 C 4.925952911376953 2 2.016377449035645 4.899822235107422 2.000067710876465 8.470109939575195 C 2.089730262756348 8.616405487060547 2.567544937133789 9.043878555297852 3.827750205993652 9.423839569091797 C 5.104559898376465 9.808799743652344 6.763870239257813 10.0208101272583 8.5 10.0208101272583 C 10.23612976074219 10.0208101272583 11.89544010162354 9.808799743652344 13.17224979400635 9.423839569091797 C 14.43245506286621 9.043878555297852 14.91026878356934 8.616405487060547 14.99993133544922 8.470109939575195 C 14.98362159729004 4.899822235107422 12.07404708862305 2 8.5 2 M 8.5 0 C 13.19441986083984 0 17 3.805580139160156 17 8.5 C 17 10.84720993041992 12.75 12.02081489562988 8.5 12.02081489562988 C 4.25 12.02081489562988 0 10.84720993041992 0 8.5 C 0 3.805580139160156 3.805580139160156 0 8.5 0 Z"></path></g></g><g fill="none" transform="translate(62 321)"><rect stroke="currentColor" stroke-width="2" width="12" height="12" rx="6"></rect><rect fill="none" x="-1" y="-1" width="14" height="14" rx="7"></rect></g><path fill="currentColor" d="M17.069,19.165H14.845v2.224H12.3V19.165H10.08V16.624H12.3V14.4h2.541v2.224h2.224Z" transform="translate(54.596 309.275)" class="menu-icon"></path></g></svg>
                    <div data-i18n="obat">Obat</div>
                  </a>
                </li>
              </ul>
              <ul class="menu-sub">
                <?php if ($_SERVER['SCRIPT_NAME'] == '/views/bhp_show.php' OR $_SERVER['SCRIPT_NAME'] == '/views/bhp_tambah.php' OR $_SERVER['SCRIPT_NAME'] == '/views/bhp_ubah.php'): ?>
                <li class="menu-item active">
                <?php else: ?>
                <li class="menu-item">
                <?php endif ?>
                  <a href="bhp_show.php" class="menu-link">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25.5" height="22.965" viewBox="0 0 25.5 22.965" class="menu-icon"><g id="tambah_dokter_staff" data-name="tambah dokter &amp; staff" transform="translate(-50.5 -312.035)"><g id="Group_1150" data-name="Group 1150" transform="translate(50.5 311.535)"><g fill="none" stroke="currentColor" stroke-width="2" transform="translate(4 0.5)"><circle stroke="none" cx="4.5" cy="4.5" r="4.5"></circle><circle fill="none" cx="4.5" cy="4.5" r="3.5"></circle></g><g fill="none" transform="translate(0 8)"><path stroke="none" d="M8.5,0A8.5,8.5,0,0,1,17,8.5c0,4.694-17,4.694-17,0A8.5,8.5,0,0,1,8.5,0Z"></path><path fill="currentColor" stroke="none" d="M 8.5 2 C 4.925952911376953 2 2.016377449035645 4.899822235107422 2.000067710876465 8.470109939575195 C 2.089730262756348 8.616405487060547 2.567544937133789 9.043878555297852 3.827750205993652 9.423839569091797 C 5.104559898376465 9.808799743652344 6.763870239257813 10.0208101272583 8.5 10.0208101272583 C 10.23612976074219 10.0208101272583 11.89544010162354 9.808799743652344 13.17224979400635 9.423839569091797 C 14.43245506286621 9.043878555297852 14.91026878356934 8.616405487060547 14.99993133544922 8.470109939575195 C 14.98362159729004 4.899822235107422 12.07404708862305 2 8.5 2 M 8.5 0 C 13.19441986083984 0 17 3.805580139160156 17 8.5 C 17 10.84720993041992 12.75 12.02081489562988 8.5 12.02081489562988 C 4.25 12.02081489562988 0 10.84720993041992 0 8.5 C 0 3.805580139160156 3.805580139160156 0 8.5 0 Z"></path></g></g><g fill="none" transform="translate(62 321)"><rect stroke="currentColor" stroke-width="2" width="12" height="12" rx="6"></rect><rect fill="none" x="-1" y="-1" width="14" height="14" rx="7"></rect></g><path fill="currentColor" d="M17.069,19.165H14.845v2.224H12.3V19.165H10.08V16.624H12.3V14.4h2.541v2.224h2.224Z" transform="translate(54.596 309.275)" class="menu-icon"></path></g></svg>
                    <div data-i18n="bhp">BHP</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- User interface -->
            <?php if ($_SERVER['SCRIPT_NAME'] == '/views/stok_obat_show.php' OR $_SERVER['SCRIPT_NAME'] == '/views/stok_bhp_show.php' OR $_SERVER['SCRIPT_NAME'] == '/views/stok_obat_tambah.php' OR $_SERVER['SCRIPT_NAME'] == '/views/stok_bhp_tambah.php' OR $_SERVER['SCRIPT_NAME'] == '/views/stok_obat_ubah.php' OR $_SERVER['SCRIPT_NAME'] == '/views/stok_bhp_ubah.php'): ?>
            <li class="menu-item active">
            <?php else: ?>
            <li class="menu-item">
            <?php endif ?>
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="User interface">Manajemen Stok</div>
              </a>
              <ul class="menu-sub">
                <?php if ($_SERVER['SCRIPT_NAME'] == '/views/stok_obat_show.php' OR $_SERVER['SCRIPT_NAME'] == '/views/stok_obat_tambah.php' OR $_SERVER['SCRIPT_NAME'] == '/views/stok_obat_ubah.php'): ?>
                <li class="menu-item active">
                <?php else: ?>
                <li class="menu-item">
                <?php endif ?>
                  <a href="stok_obat_show.php" class="menu-link">
                    <div data-i18n="Accordion">Stok Obat</div>
                  </a>
                </li>
                <?php if ($_SERVER['SCRIPT_NAME'] == '/views/stok_bhp_show.php' OR $_SERVER['SCRIPT_NAME'] == '/views/stok_bhp_tambah.php' OR $_SERVER['SCRIPT_NAME'] == '/views/stok_bhp_ubah.php'): ?>
                <li class="menu-item active">
                <?php else: ?>
                <li class="menu-item">
                <?php endif ?>
                  <a href="stok_bhp_show.php" class="menu-link">
                    <div data-i18n="Alerts">Stok BHP</div>
                  </a>
                </li>
              </ul>
            </li>
<?php endif ?>
            <li class="menu-header small text-uppercase">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cog" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="menu-icon svg-inline--fa fa-cog fa-w-16"><path fill="currentColor" d="M487.4 315.7l-42.6-24.6c4.3-23.2 4.3-47 0-70.2l42.6-24.6c4.9-2.8 7.1-8.6 5.5-14-11.1-35.6-30-67.8-54.7-94.6-3.8-4.1-10-5.1-14.8-2.3L380.8 110c-17.9-15.4-38.5-27.3-60.8-35.1V25.8c0-5.6-3.9-10.5-9.4-11.7-36.7-8.2-74.3-7.8-109.2 0-5.5 1.2-9.4 6.1-9.4 11.7V75c-22.2 7.9-42.8 19.8-60.8 35.1L88.7 85.5c-4.9-2.8-11-1.9-14.8 2.3-24.7 26.7-43.6 58.9-54.7 94.6-1.7 5.4.6 11.2 5.5 14L67.3 221c-4.3 23.2-4.3 47 0 70.2l-42.6 24.6c-4.9 2.8-7.1 8.6-5.5 14 11.1 35.6 30 67.8 54.7 94.6 3.8 4.1 10 5.1 14.8 2.3l42.6-24.6c17.9 15.4 38.5 27.3 60.8 35.1v49.2c0 5.6 3.9 10.5 9.4 11.7 36.7 8.2 74.3 7.8 109.2 0 5.5-1.2 9.4-6.1 9.4-11.7v-49.2c22.2-7.9 42.8-19.8 60.8-35.1l42.6 24.6c4.9 2.8 11 1.9 14.8-2.3 24.7-26.7 43.6-58.9 54.7-94.6 1.5-5.5-.7-11.3-5.6-14.1zM256 336c-44.1 0-80-35.9-80-80s35.9-80 80-80 80 35.9 80 80-35.9 80-80 80z" class="menu-icon"></path></svg>
              <span class="menu-header-text">Settings</span>
            </li>
            <?php if ($_SERVER['SCRIPT_NAME'] == '/views/owner_ubah.php'): ?>
            <li class="menu-item active">
            <?php else: ?>
            <li class="menu-item">
            <?php endif ?>
              <?php if (isset($_SESSION['id_owner'])): ?>
                <a href="owner_ubah.php?id_owner=<?= $_SESSION['id_owner']; ?>" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-dock-top"></i>
                  <div data-i18n="Account Settings">Account Settings</div>
                </a>
              <?php elseif (isset($_SESSION['id_dokter'])): ?>  
                <a href="dokter_ubah.php?id_dokter=<?= $_SESSION['id_dokter']; ?>" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-dock-top"></i>
                  <div data-i18n="Account Settings">Account Settings</div>
                </a>
              <?php elseif (isset($_SESSION['id_staff'])): ?>  
                <a href="staff_ubah.php?id_staff=<?= $_SESSION['id_staff']; ?>" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-dock-top"></i>
                  <div data-i18n="Account Settings">Account Settings</div>
                </a>
              <?php endif ?>
            </li>            
          </ul>
        </aside>