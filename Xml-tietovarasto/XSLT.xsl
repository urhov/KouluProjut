<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
<html>
<body>
    <h2>elokuvakirjasto</h2>
    <table border="1">
        <tr bgcolor="#9acd32">
            <th>ohjaaja</th>
            <th>nimi</th>
            <th>genre</th>
            <th>ikäraja</th>
        </tr>
        <xsl:for-each select="elokuvakirjasto/elokuva">
        <tr>
            <td><xsl:value-of select="ohjaaja"/></td>
            <td><xsl:value-of select="nimi"/></td>
            <td><xsl:value-of select="genre"/></td>
            <td><xsl:value-of select="ikäraja"/></td>
        </tr>

        </xsl:for-each>
        </table>
</body>
</html>
</xsl:template> 

</xsl:stylesheet>