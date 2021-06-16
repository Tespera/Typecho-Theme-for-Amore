<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="2.0"
				xmlns:html="http://www.w3.org/TR/REC-html40"
				xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9"
				xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>
	<xsl:template match="/">
		<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
				<title>述尔 · 站点地图</title>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<style type="text/css">
					body {
						font-family:"PingFang,Courier New,Courier;
						font-size:14px;
					}

					table {
						width: 100%;
					}

					td {
						font-size:12px;
					}

					th {
						text-align:left;
						padding-right:36px;
						font-size:11px;
					}

					tr.even {
						background-color:whitesmoke;
					}

					#footer {
						padding:2px;
						margin:10px;
						font-size:8pt;
						color:gray;
					}

					#footer a {
						color:gray;
					}

					a {
						color:black;
					}
				</style>
			</head>
			<body>
				<h3>述尔 · 站点地图</h3>				
				<div id="content">
					<table cellpadding="5">
						<tr style="border-bottom:1px black solid;">
							<th>URL</th>
							<th>Priority</th>
							<th>Change Frequency</th>
							<th>LastChange</th>
						</tr>
						<xsl:variable name="lower" select="'abcdefghijklmnopqrstuvwxyz'"/>
						<xsl:variable name="upper" select="'ABCDEFGHIJKLMNOPQRSTUVWXYZ'"/>
						<xsl:for-each select="sitemap:urlset/sitemap:url">
						<tr>
							<xsl:if test="position() mod 2 != 0">
								<xsl:attribute  name="class">ood</xsl:attribute>
							</xsl:if>
							<xsl:if test="position() mod 2 != 1">
								<xsl:attribute  name="class">even</xsl:attribute>
							</xsl:if>
							<td>
								<xsl:variable name="itemURL">
									<xsl:value-of select="sitemap:loc"/>
								</xsl:variable>
								<a href="{$itemURL}">
									<xsl:value-of select="sitemap:loc"/>
								</a>
							</td>
							<td>
								<xsl:value-of select="concat(sitemap:priority*100,'%')"/>
							</td>
							<td>
								<xsl:value-of select="concat(translate(substring(sitemap:changefreq, 1, 1),concat($lower, $upper),concat($upper, $lower)),substring(sitemap:changefreq, 2))"/>
							</td>
							<td>
								<xsl:value-of select="concat(substring(sitemap:lastmod,0,11),concat(' ', substring(sitemap:lastmod,12,5)))"/>
							</td>
						</tr>
						</xsl:for-each>
					</table>
				</div>
				<div id="footer">
					By <a href="https://amore.ink/" target="_blank">Amore</a>
				</div>
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>