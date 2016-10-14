<?php echo '<?xml version="1.0" encoding="utf-8"?' .'>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<jdoc:include type="head" />
		<link rel="stylesheet" href="templates/_system/css/general.css" type="text/css" />
		<link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
	</head>
	
	<body id="page_bg">
		<jdoc:include type="message" />
		<div id="logo">&nbsp</div>
		<div id="container">
			<div id="col2">
				<jdoc:include type="component" />
			</div>
			<div id="col1">
				<jdoc:include type="modules" name="left" style="xhtml" />
			</div>
			<div class="myclear">&nbsp;</div>
		</div>	
		<jdoc:include type="modules" name="debug" />
	
	</body> 
</html>
