<?php /* Smarty version Smarty-3.0.7, created on 2015-08-30 13:48:04
         compiled from "application/views\operator/welcome/index.html" */ ?>
<?php /*%%SmartyHeaderCode:2324155e2ed74e9e1b6-86007186%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09687b82d48845a0230e2754353181487647abcd' => 
    array (
      0 => 'application/views\\operator/welcome/index.html',
      1 => 1439384509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2324155e2ed74e9e1b6-86007186',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="content-header">
    <h1>Dashboard</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Dashboard</a></li>
    </ol>
</section>
<section class="content">
    <div class="alert alert-warning" role="alert">
    	<h4>Selamat Datang <?php echo $_smarty_tpl->getVariable('com_user')->value['role_nm'];?>
!</h4>
    	<p>Anda Telah Masuk ke Halaman Utama Sistem Pakar Diagnosa Penyakit HIV/Aids</p>
    </div>
    <div class="row">
    	<div class="col-md-6">
    		<div class="box box-solid bg-maroon-gradient">
    			<div class="box-header ui-sortable-handle" style="cursor: move;">
    				<i class="fa fa-th"></i>
    				<h3 class="box-title">Grafik Peminatan</h3>
    				<div class="box-tools pull-right">
    					<button class="btn bg-maroon-active btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
    					<button class="btn bg-maroon btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
    				</div>
    			</div>
    			<div class="box-body border-radius-none">
    				<div class="chart" id="line-chart" style="height: 250px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="250" version="1.1" width="511" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative; left: -0.75px; top: -0.59375px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="40.5" y="214" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 10px; line-height: normal; font-family: 'Open Sans';" font-size="10px" font-family="Open Sans" font-weight="normal"><tspan dy="3.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#efefef" d="M53,214H486" stroke-width="0.4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="40.5" y="166.75" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 10px; line-height: normal; font-family: 'Open Sans';" font-size="10px" font-family="Open Sans" font-weight="normal"><tspan dy="3.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">5,000</tspan></text><path fill="none" stroke="#efefef" d="M53,166.75H486" stroke-width="0.4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="40.5" y="119.5" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 10px; line-height: normal; font-family: 'Open Sans';" font-size="10px" font-family="Open Sans" font-weight="normal"><tspan dy="3.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">10,000</tspan></text><path fill="none" stroke="#efefef" d="M53,119.5H486" stroke-width="0.4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="40.5" y="72.25" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 10px; line-height: normal; font-family: 'Open Sans';" font-size="10px" font-family="Open Sans" font-weight="normal"><tspan dy="3.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">15,000</tspan></text><path fill="none" stroke="#efefef" d="M53,72.25H486" stroke-width="0.4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="40.5" y="25" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 10px; line-height: normal; font-family: 'Open Sans';" font-size="10px" font-family="Open Sans" font-weight="normal"><tspan dy="3.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">20,000</tspan></text><path fill="none" stroke="#efefef" d="M53,25H486" stroke-width="0.4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="406.55528554070474" y="226.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 10px; line-height: normal; font-family: 'Open Sans';" font-size="10px" font-family="Open Sans" font-weight="normal" transform="matrix(1,0,0,1,0,5.5)"><tspan dy="3.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2013</tspan></text><text x="213.9939246658566" y="226.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 10px; line-height: normal; font-family: 'Open Sans';" font-size="10px" font-family="Open Sans" font-weight="normal" transform="matrix(1,0,0,1,0,5.5)"><tspan dy="3.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan></text><path fill="none" stroke="#efefef" d="M53,188.8063C65.10085054678007,188.5417,89.30255164034023,190.4009875,101.40340218712029,187.74790000000002C113.50425273390036,185.09481250000002,137.70595382746052,168.75624016393445,149.80680437424058,167.5816C161.77612393681653,166.41972766393442,185.7147630619684,180.6438625,197.68408262454435,178.40185C209.6534021871203,176.15983749999998,233.59204131227216,151.8811350409836,245.5613608748481,149.6455C257.6622114216282,147.3852975409836,281.8639125151883,158.0678125,293.96476306196837,160.4185C306.06561360874844,162.7691875,330.2673147023086,179.61898934426227,342.3681652490887,168.451C354.33748481166464,157.40440184426228,378.27612393681653,78.52883321823204,390.2454434993925,71.56015C402.08323207776425,64.66804571823204,425.7588092345079,105.24937403846155,437.5965978128797,113.00785C449.69744835965975,120.93873653846155,473.89914945321993,128.9901625,486,134.3176" stroke-width="2" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="53" cy="188.8063" r="4" fill="#efefef" stroke="#efefef" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="101.40340218712029" cy="187.74790000000002" r="4" fill="#efefef" stroke="#efefef" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="149.80680437424058" cy="167.5816" r="4" fill="#efefef" stroke="#efefef" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="197.68408262454435" cy="178.40185" r="4" fill="#efefef" stroke="#efefef" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="245.5613608748481" cy="149.6455" r="4" fill="#efefef" stroke="#efefef" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="293.96476306196837" cy="160.4185" r="4" fill="#efefef" stroke="#efefef" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="342.3681652490887" cy="168.451" r="4" fill="#efefef" stroke="#efefef" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="390.2454434993925" cy="71.56015" r="4" fill="#efefef" stroke="#efefef" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="437.5965978128797" cy="113.00785" r="4" fill="#efefef" stroke="#efefef" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="486" cy="134.3176" r="4" fill="#efefef" stroke="#efefef" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="left: 6.5px; top: 114px; display: block;"><div class="morris-hover-row-label">2011 Q1</div><div class="morris-hover-point" style="color: #efefef">
    					Item 1:
    					2,666
    				</div></div></div>
    			</div><!-- /.box-body -->

    		</div>
    	</div><!-- /.col (LEFT) -->
    	<div class="col-md-6">

    		<div class="box box-solid bg-blue-gradient">
    			<div class="box-header ui-sortable-handle" style="cursor: move;">
    				<i class="fa fa-calendar"></i>
    				<h3 class="box-title">Calendar</h3>
    				<!-- tools box -->
    				<div class="pull-right box-tools">
    					<!-- button with a dropdown -->
    					<div class="btn-group">
    						<button class="btn bg-blue-gradient btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
    						<ul class="dropdown-menu pull-right" role="menu">
    							<li><a href="#">Add new event</a></li>
    							<li><a href="#">Clear events</a></li>
    							<li class="divider"></li>
    							<li><a href="#">View calendar</a></li>
    						</ul>
    					</div>
    					<button class="btn bg-blue-gradient btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
    					<button class="btn bg-blue-gradient btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
    				</div><!-- /. tools -->
    			</div><!-- /.box-header -->
    			<div class="box-body no-padding">
    				<!--The calendar -->
    				<div id="calendar" style="width: 100%"><div class="datepicker datepicker-inline"><div class="datepicker-days" style="display: block;"><table class="table table-condensed"><thead><tr><th class="prev" style="visibility: visible;">«</th><th colspan="5" class="datepicker-switch">June 2015</th><th class="next" style="visibility: visible;">»</th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td class="old day">31</td><td class="day">1</td><td class="day">2</td><td class="day">3</td><td class="day">4</td><td class="day">5</td><td class="day">6</td></tr><tr><td class="day">7</td><td class="day">8</td><td class="day">9</td><td class="day">10</td><td class="day">11</td><td class="day">12</td><td class="day">13</td></tr><tr><td class="day">14</td><td class="day">15</td><td class="day">16</td><td class="day">17</td><td class="day">18</td><td class="day">19</td><td class="day">20</td></tr><tr><td class="day">21</td><td class="day">22</td><td class="day">23</td><td class="day">24</td><td class="day">25</td><td class="day">26</td><td class="day">27</td></tr><tr><td class="day">28</td><td class="day">29</td><td class="day">30</td><td class="new day">1</td><td class="new day">2</td><td class="new day">3</td><td class="new day">4</td></tr><tr><td class="new day">5</td><td class="new day">6</td><td class="new day">7</td><td class="new day">8</td><td class="new day">9</td><td class="new day">10</td><td class="new day">11</td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-months" style="display: none;"><table class="table table-condensed"><thead><tr><th class="prev" style="visibility: visible;">«</th><th colspan="5" class="datepicker-switch">2015</th><th class="next" style="visibility: visible;">»</th></tr></thead><tbody><tr><td colspan="7"><span class="month">Jan</span><span class="month">Feb</span><span class="month">Mar</span><span class="month">Apr</span><span class="month">May</span><span class="month">Jun</span><span class="month">Jul</span><span class="month">Aug</span><span class="month">Sep</span><span class="month">Oct</span><span class="month">Nov</span><span class="month">Dec</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-years" style="display: none;"><table class="table table-condensed"><thead><tr><th class="prev" style="visibility: visible;">«</th><th colspan="5" class="datepicker-switch">2010-2019</th><th class="next" style="visibility: visible;">»</th></tr></thead><tbody><tr><td colspan="7"><span class="year old">2009</span><span class="year">2010</span><span class="year">2011</span><span class="year">2012</span><span class="year">2013</span><span class="year">2014</span><span class="year">2015</span><span class="year">2016</span><span class="year">2017</span><span class="year">2018</span><span class="year">2019</span><span class="year new">2020</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div></div></div>
    			</div><!-- /.box-body -->

    		</div>
    	</div><!-- /.col (RIGHT) -->
    </div><!-- /.row -->

</section>
