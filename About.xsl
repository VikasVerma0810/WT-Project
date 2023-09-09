<?xml version="1.0" encoding="UTF-8"?>
<html xsl:version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<style>
  *{
    margin:0;
    padding:0;
    text-align:center;
  }
</style>
<body style="font-family:Arial;font-size:12pt;background-color:#EEEEEE">
<h1 style="margin:20px 0px">About the developers</h1>
<xsl:for-each select="Developers/Student">
  <div style="background-color:teal;color:white;padding:4px">
    <span style="font-weight:bold"><xsl:value-of select="name"/> - </span>
    <xsl:value-of select="roll"/>
    </div>
  <div style="margin-left:20px;margin-bottom:1em;font-size:10pt">
    <p>
    Role - <xsl:value-of select="role"/>
    </p>
  </div>
</xsl:for-each>
</body>
</html>