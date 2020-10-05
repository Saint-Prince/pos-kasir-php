 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>Data Laporan
							<!--<a  style="padding-left:2pc;" href="fungsi/hapus/hapus.php?laporan=jual" onclick="javascript:return confirm('Data Laporan akan di Hapus ?');">
								<button class="btn btn-danger">RESET</button>
							</a>-->
							<?php if(!empty($_GET['cari'])){
								echo 'Periode Bulan ke - '.$_POST['bln'].'/'.$_POST['thn'];
							}
							?>
							
							<a style="padding-left:2pc;" href="index.php?page=laporan">
								<button class="btn btn-success">Refresh</button></a>
						</h3>
						<br/>
						<h4>Cari Laporan Per Perbulan</h4>
						<br/>
						<form method="post" action="index.php?page=laporan&cari=ok">
							<table>
								<tr>
								<td style="padding-left:2pc;padding-bottom:1pc;">
									Pilih Bulan
								</td>
								<td style="padding-left:2pc;padding-bottom:1pc;">
									Pilih Tahun
								</td>
								<td style="padding-left:2pc;padding-bottom:1pc;">
									Aksi
								</td>
								</tr>
								<tr>
								<td style="padding-left:2pc;">
								<select name="bln" class="form-control">
									<option selected="selected">Bulan</option>
									<?php
									$bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
									$jlh_bln=count($bulan);
									$bln1 = array('01','02','03','04','05','06','07','08','09','10','11','12');
									$no=1;
									for($c=0; $c<$jlh_bln; $c+=1){
										echo"<option value='$bln1[$c]'> $bulan[$c] </option>";
									$no++;}
									?>
									</select>
								</td>
								<td style="padding-left:2pc;">
								<?php
									$now=date('Y');
									echo "<select name='thn' class='form-control'>";
									echo '
									<option selected="selected">Tahun</option>';
									for ($a=2017;$a<=$now;$a++)
									{
										echo "<option value='$a'>$a</option>";
									}
									echo "</select>";
									?>
								</td>
								<td style="padding-left:2pc;">
									<input type="hidden" name="periode" value="ya">
									<button class="btn btn-primary">
										<i class="fa fa-search"></i> Cari
									</button>
								</td>
								</tr>
							</table>
						</form>
						<br/>
						<br/>
						<?php if(isset($_GET['remove'])){?>
						<div class="alert alert-danger">
							<p>Hapus Data Berhasil !</p>
						</div>
						<?php }?>
						
						<?php if(!empty($_GET['cari'])){?>
						<!-- view barang -->	
						<div class="modal-view">
							<table class="table table-bordered" id="example1">
								<thead>
									<tr style="background:#DFF0D8;color:#333;">
										<th> No</th>
										<th> ID Barang</th>
										<th> Nama Barang</th>
										<th style="width:10%;"> Jumlah</th>
										<th style="width:20%;"> Total</th>
										<th> Kasir</th>
										<th> Tanggal Input</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$periode = $_POST['bln'].'-'.$_POST['thn'];
										$no=1; 
										$bayar = 0;
										$hasil = $lihat -> periode_jual($periode);
										foreach($hasil as $isi){
											$bayar += $isi['total'];
									?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $isi['id_barang'];?></td>
										<td><?php echo $isi['nama_barang'];?></td>
										<td><?php echo $isi['jumlah'];?> </td>
										<td>Rp.<?php echo number_format($isi['total']);?>,-</td>
										<td><?php echo $isi['nm_member'];?></td>
										<td><?php echo $isi['tanggal_input'];?></td>
									</tr>
									<?php $no++; }?>
									<?php $hasil = $lihat -> jumlah_nota(); ?>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="4">Pemasukan</td>
										<th>Rp.<?php echo number_format($bayar);?>,-</td>
										<th colspan="2" style="background:#ddd"></th>
									</tr>
								</tfoot>
							</table>
							<div class="clearfix" style="padding-top:27%;"></div>
						</div>
						<?php }else{?>
						<!-- view barang -->	
						<div class="modal-view">
							<table class="table table-bordered" id="example1">
								<thead>
									<tr style="background:#DFF0D8;color:#333;">
										<th> No</th>
										<th> ID Barang</th>
										<th> Nama Barang</th>
										<th style="width:10%;"> Jumlah</th>
										<th style="width:20%;"> Total</th>
										<th> Kasir</th>
										<th> Tanggal Input</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; $hasil = $lihat -> jual();?>
									<?php 
									$bayar = 0;
									foreach($hasil as $isi){ 
											$bayar += $isi['total'];
									?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $isi['id_barang'];?></td>
										<td><?php echo $isi['nama_barang'];?></td>
										<td><?php echo $isi['jumlah'];?> </td>
										<td>Rp.<?php echo number_format($isi['total']);?>,-</td>
										<td><?php echo $isi['nm_member'];?></td>
										<td><?php echo $isi['tanggal_input'];?></td>
									</tr>
									<?php $no++; }?>
									<?php $hasil = $lihat -> jumlah_nota(); ?>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="4">Total Pemasukan</td>
										<th>Rp.<?php echo number_format($bayar);?>,-</td>
										<th colspan="2" style="background:#ddd"></th>
									</tr>
								</tfoot>
							</table>
							<div class="clearfix" style="padding-top:27%;"></div>
						</div>
						<?php }?>
					</div>
				  </div>
              </div>
          </section>
      </section>
	

