<!-- Start About Greenforest Section -->
<section class="bg-about-greenforest">
    <div class="container">
        <div class="row">
            <div class="about-greenforest">
                <?php $noprof=1; foreach($profil as $profil) { if($noprof==1) { ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="about-greenforest-content">
                            <h2><?php echo $profil->judul_berita ?></h2>
                            <p class="text-justify"> <?php echo character_limiter(strip_tags($profil->isi), 500); ?></p>
                           
                            <a href="<?php echo base_url('berita/profil/' . $profil->slug_berita); ?>" class="btn btn-default"><i class="fa fa-chevron-right"></i> Selengkapnya</a>
                        </div>
                        
                        <!-- .about-greenforest-content -->
                    </div>
                    <!-- .col-md-8 -->
                    <div class="col-md-4">
                        <div class="about-greenforest-img">
                            <img src="<?php echo base_url('assets/upload/image/'.$profil->gambar) ?>" alt="about-greenforet-img" class="img-responsive" />
                        </div>
                        <!-- .about-greenforest-img -->
                    </div>
                    <!-- .col-md-4 -->
                </div>
                <?php }$noprof++; } ?>
            </div>
            <!-- .about-greenforest -->
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</section>
