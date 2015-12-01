<?xml version="1.0" ?>
<xsl:transform xmlns:xsl="http://www.w3.org/1999/XSL/Transform"	version="2.0">
	<xsl:template match="*">
		<xsl:applytemplates/>
	</xsl:template>
	<xsl:template match="text()">
		<xsl:applytemplates/>
	</xsl:template>
	<xsl:template match="/">
		<html>
			<head>
				<title></title>
			</head>
			<body>
				
			</body>
		</html>
	</xsl:template>
	
	<xsl:template match="">
		<xsl:value-of select="."/>
	</xsl:template>

	<xsl:template match="">
		<xsl:value-of select=""/>
	</xsl:template>
	
	<xsl:template match="">
		<xsl:value-of select=""/>
	</xsl:template>
	
	<xsl:template match="">
		<xsl:value-of select=""/>
	</xsl:template>
		
	<xsl:template match="">
		<xsl:value-of select=""/>,
		<xsl:value-of select=""/>.
	</xsl:template>
</xsl:transform>