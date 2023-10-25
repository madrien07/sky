<?php

include_once 'implements/GlobalFunction.php';

$rubriques=GlobalFunction::selectAll("SELECT * FROM rubrique",[]);
if(!isset($_SESSION))
{
	session_start();
}
;?>

<header class="primary">
			<div class="firstbar">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-12">
							<div class="brand">
								<a href="index.php">
									<img src="images/logo.png" alt="Magz Logo">
								</a>
							</div>						
						</div>
						<div class="col-md-6 col-sm-12">
							<form class="search" autocomplete="off">
								<div class="form-group">
									<div class="input-group">
										<input type="text" name="q" class="form-control" placeholder="Type something here">									
										<div class="input-group-btn">
											<button class="btn btn-primary"><i class="ion-search"></i></button>
										</div>
									</div>
								</div>
								<div class="help-block">
									<div>Populaire:</div>
									<ul>
										<?php foreach($rubriques as $rubrique):?>
											<li><a href="<?=$rubrique['nom'];?>"><?=$rubrique['nom'];?></a></li>
										<?php endforeach;?>
									</ul>
								</div>
							</form>								
						</div>
						<div class="col-md-3 col-sm-12 text-right">
							<ul class="nav-icons">
								<?php if(isset($_SESSION['nom_complet'])):?>
									<li><a href="deconnexion.php"><i class="ion-person"></i><div>(<?=isset($_SESSION['nom_complet'])?$_SESSION['nom_complet']:'';?>)</div></a></li>
								<?php else:?>
								 
									<li><a href="login.php"><i class="ion-person"></i><div>Se Connecter</div></a></li>
								<?php endif;?>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<!-- Start nav -->
			<nav class="menu">
				<div class="container">
					<div class="brand">
						<a href="#">
							<img src="images/logo.png" alt="Magz Logo">
						</a>
					</div>
					<div class="mobile-toggle">
						<a href="#" data-toggle="menu" data-target="#menu-list"><i class="ion-navicon-round"></i></a>
					</div>
					<div class="mobile-toggle">
						<a href="#" data-toggle="sidebar" data-target="#sidebar"><i class="ion-ios-arrow-left"></i></a>
					</div>
					<div id="menu-list">
						<ul class="nav-list">
							<li class="for-tablet nav-title"><a>Menu</a></li>
							<li class="for-tablet"><a href="login.php">Login</a></li>
							<li class="for-tablet"><a href="register.php">Register</a></li>
							 
							 <?php foreach($rubriques as $rubrique):?>
								<li class="dropdown magz-dropdown magz-dropdown-megamenu"><a href="#"><?=$rubrique['nom'];?><i class="ion-ios-arrow-right"></i> </a>
									<div class="dropdown-menu megamenu">
										<div class="megamenu-inner">
											<div class="row">
												<div class="col-md-3">
													<div class="row">
														<div class="col-md-12">
															<h2 class="megamenu-title">Trending</h2>
														</div>
													</div>
													<?php
															$sousRubriques=GlobalFunction::selectAll("SELECT * FROM sous_rubrique WHERE id_rubrique=?",[$rubrique['id_rubrique']]);
													;?>
													<ul class="vertical-menu">
														<?php foreach($sousRubriques as $sRubrique):?> 
															<li><a href="#"><i class="ion-ios-circle-outline"></i><?=$sRubrique['nom'];?></a></li>
														<?php endforeach;?>
													</ul>
												</div>
												<div class="col-md-9">
													<div class="row">
														<div class="col-md-12">
															<h2 class="megamenu-title">Posts Recent</h2>
														</div>
													</div>

													<?php
													
																$posts=GlobalFunction::selectAll("SELECT * FROM article a ,rubrique r WHERE a.idRub=r.id_rubrique AND a.idRub=? ORDER BY date_pubArt LIMIT 3",[$rubrique['id_rubrique']])
													;?>
													<div class="row">
														<?php foreach($posts as $post):?>
																<article class="article col-md-4 mini">
																	<div class="inner">
																		<figure>
																			<a href="single.php?tag=<?=$post['idArticle'];?>">
																				<img src="article/<?=$post['imageTitle'];?>" alt="Sample Article">
																			</a>
																		</figure>
																		<div class="padding">
																			<div class="detail">
																				<div class="time"><?=GlobalFunction::formaterDate($post['date_pubArt']);?></div>
																				<div class="category"><a href="category.php?tag=<?=$post['idRub'];?>"><?=$post['nom'];?></a></div>
																			</div>
																			<h2><a href="single.php?tag=<?=$post['idArticle'];?>"><?=$post['titre'];?></a></h2>
																		</div>
																	</div>
																</article>
														<?php endforeach;?>
													
													</div>
												</div>
											</div>								
										</div>
									</div>
								</li>
							<?php endforeach;?>
							<?php if(isset($_SESSION['nom_complet'])):?>
								<li class="dropdown magz-dropdown"><a href="#"> PARAMETRES<i class="ion-ios-arrow-right"></i></a>
									<ul class="dropdown-menu">
										<li><a href="#"><i class="icon ion-person"></i> Mon Compte</a></li>
										<li><a href="#"><i class="icon ion-heart"></i> Mes J'aime</a></li>
										<li><a href="#"><i class="icon ion-chatbox"></i> Commentaires</a></li>
										<li><a href="#"><i class="icon ion-key"></i> Changer Mot de passe</a></li>
										<li><a href="#"><i class="icon ion-settings"></i> Parametres</a></li>
										<li class="divider"></li>
										<li><a href="deconnexion.php"><i class="icon ion-log-out"></i> Se deconnecter</a></li>
									</ul>
								</li>
				 

							<?php endif;?>
						</ul>
					</div>
				</div>
			</nav>
			<!-- End nav -->
		</header>
