<h1 class="text-center">Bem vindo(a) <?=$_SESSION['nome']?></h1>
<div class="row">
	<div class="card mt-5 mx-auto">
		<div class="card-body">
			<h4>Acesse os itens da sua unidade pelo menu de navegação</h4>
			<ul class="text-center" style="  list-style-type: none;">
				<li class="nav-item <?= ($_pagina == 'leads') ? 'active' : ''; ?>">
					<a class="nav-link" href="./?pagina=leads">
						<i class="fas fa-chart-area"></i>
						<span> Leads</span></a>
					</li>

					<li class="nav-item <?= ($_pagina == 'banner') ? 'active' : ''; ?>">
						<a class="nav-link" href="./?pagina=banner">
							<i class="far fa-images"></i><span> Banner</span>
						</a>
					</li>
					<li class="nav-item <?= ($_pagina == 'depoimentos') ? 'active' : ''; ?>">
						<a class="nav-link" href="./?pagina=depoimentos">
							<i class="far fa-star"></i><span> Depoimentos</span>
						</a>
					</li>
					<!-- Divider -->
					<hr class="sidebar-divider">
					<!-- Heading -->
					<li class="nav-item <?= ($_pagina == 'atualizar') ? 'active' : ''; ?>">
						<a class="nav-link" href="./?pagina=atualizar">
							<i class="fa fa-id-badge"></i><span> Meus dados</span>
						</a>
					</li>
					<li class="nav-item <?= ($_pagina == 'unidade') ? 'active' : ''; ?>">
						<a class="nav-link" href="./?pagina=unidade">
							<i class="fas fa-solar-panel"></i><span> Dados unidade</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>