<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head>
                <title>Kommentit</title>
                <link rel="stylesheet" href="xsl-css.css" />
                
            </head>
            <body>
                <h2>Kommentit</h2>
                
                <xsl:for-each select="data/user">
                    <div class="kortti">
                    <h1>
                    <xsl:value-of select="nimimerkki"/>
                    </h1>
                        <p>
                            <xsl:value-of select="kommentti" />
                        </p>
                        <p>
                            <xsl:value-of select="pvm" />
                        </p>
                        
                    </div>
                </xsl:for-each>
            </body>
        </html>
    </xsl:template> 
</xsl:stylesheet>
