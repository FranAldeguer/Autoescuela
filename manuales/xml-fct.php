
<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl= "http://www.w3.org/1999/XSL/Transform" version="1.0" >
      
       <!-- Lista completa con los productos -->
       <xsl:template match="cliente_listas[@tipo='full']">
             <div class='cli-lst-area'>






                   <!-- Recorrido para ver todas las listas -->
                   <xsl:for-each select="lista">
                        
                         <div class='cli-lst' id= "cli-lst-{@id}">
                               <xsl:if test="position()=1"><xsl:attribute name="class">cli-lst cli-lst-first </xsl:attribute></xsl:if>


                               <!-- Cabecera -->
                               <div class='cli-lst-cab'>
                                     <div class = "cli-lst-titulo" >Título: <a href="javascript:ShopOnline.Cliente.verArtLista({@id})" ><xsl:value-of select="@titulo" /></a></div>
                                     <div class = "cli-lst-fecha"> Fecha: <xsl:value-of select= "@fecha"/></div>
                               </div>
                              
                               <!-- Datos -->
                               <div class='cli-lst-datos'>    
                                     <xsl:if test="@tipo = 'pri'">
                                     </xsl:if>
                                     <div class = "cli-lst-tipo"> Tipo: <xsl:value-of select= "@tipo"/></div>
                                     <div class = "cli-lst-usuario" >Usuario: <xsl:value-of select= "@usuario"/></div>
                                     <div class = "cli-lst-clave"> Clave: <xsl:value-of select= "@clave"/></div>
                               </div>      


                               <!-- Acciones de la lista -->
                               <div class='cli-lst-actions'>
                                     <a href = 'javascript:ShopOnline.Cliente.editLista({@id})' >Editar</a>
                                     <span class='cli-lst-actions-sep' >&#160;</span>
                                     <a href = 'javascript:ShopOnline.Cliente.vaciarList({@id})' >Vaciar</a>
                                     <a href = 'javascript:ShopOnline.Cliente.delList({@id})' >Eliminar</a>
                                     <span class='cli-lst-actions-sep' >&#160;</span>
                                     <a href = 'javascript:ShopOnline.Cliente.delSeleccion()' >Eliminar marcados</a>
                               </div>      
                        
                               <!-- Articulos de la lista -->
                               <div class ="cli-lst-articulos" id="cli-lst-articulos-{@id}" >
                                    
                                     <!-- Recorrido -->
                                     <xsl:for-each select="articulos_lista/articulo" >
                                           <!-- Detalles del articulo -->
                                           <div class='cli-lst-art' id="cli-lst-art-{@id_lista_art}" >
                                                
                                                 <div class='cli-lst-art-cab' >
                                                       <div class = "cli-lst-art-codigo" ><xsl:value-of select="@cod_articulo"/></div>
                                                       <div class = "cli-lst-art-nombre" ><xsl:value-of select="@nombre"/></div>
                                                 </div>


                                                 <div class = "cli-lst-art-imagen" ><img src="{@imagen}"></img></div>


                                                 <div class = "cli-lst-art-check" >
                                                       <input type="checkbox" class="cli-lst-art-checkbox" value="{@id_lista_art}" ></input>
                                                 </div>
                                                
                                           </div>
                                     </xsl:for-each>
                               </div>
                              


                         </div>
                   </xsl:for-each>
                   <xsl:if test="count(lista)=0">
                         <div class = "cli-lst-sinlistas">
                              NO HAY LISTAS
                               <button type="button" onclick="ShopOnline.Cliente.newLista()" >Crear lista</button>
                         </div>
                   </xsl:if>
             </div>
       </xsl:template>
      
       <!-- Lista simple -->
       <xsl:template match="cliente_listas[@tipo='lite']">
             <div class='cli-lst-area'>
                  
                   <!-- Recorrido -->
                   <xsl:for-each select="lista">
                         <div class='cli-lst' id= "cli-lst-{@id}">
                              
                               <!-- Detalles de la lista -->
                               <div class = "cli-lst-titulo"> Título: <xsl:value-of select= "@titulo"/></div>
                               <div class = "cli-lst-fecha"> Fecha: <xsl:value-of select= "@fecha"/></div>
                               <div class = "cli-lst-tipo"> Tipo: <xsl:value-of select= "@tipo"/></div>
                               <div class = "cli-lst-select">
                                     <button id_lista="{@id}" type="button" >Seleccionar</button>
                               </div>
                         </div>
                   </xsl:for-each>
             </div>
       </xsl:template>
      
       <!-- Formulario para crear listas -->
       <xsl:template match="cliente_listas[@tipo='edit']">
            
             <!-- Mensajes de error -->
      <div class='err-messages' style='display:none'>
             <div id='etiG_alert_captcha'> @@etiG_alert_captcha@@</div>
             <div class='etiA_faltan_campos'> @@etiA_faltan_campos@@</div>
            
      </div>
            
             <!-- Lista seleccionada -->
             <xsl:variable name="lstSel" select= "lista[@selected='1']"/>
            
             <!--<xsl:value-of select="$lstSel/@cod_cliente"/>-->
             <xsl:value-of select="$lstSel/@cod_cliente"/>
            
             <div class='cli-lst-area'>
                   <div class='cli-lst' id= "cli-lst-{@id}">
                         <!-- Formulario -->
                         <form id = "cli-lst-formulario" method = "post" class ="form_web" >
                               <input type="hidden" name= "id_lista" value="{$lstSel/@id}" />
                  
                               <div class = "registro_fila">
                                     <div class = "registro_form_eti cli-lst-titulo-eti"> Título:</div>
                                     <div class = "registro_form_campo cli-lst-titulo-inp"><input type= "text" name="titulo" alias="titulo" value="{$lstSel/@titulo}" class = "not_null"/></div>
                               </div>
                               <div class = "registro_fila">
                                     <div class = "registro_form_eti cli-lst-usuario-eti"> Usuario:</div>
                                     <div class = "registro_form_campo cli-lst-usuario-inp"><input type= "text" name="usuario" alias="usuario" value="{$lstSel/@usuario}" /> </div>
                               </div>
                               <div class = "registro_fila">
                                     <div class = "registro_form_eti cli-lst-clave-eti"> Clave:</div>
                                     <div class = "registro_form_campo cli-lst-clave-inp"><input type= "text" name="clave" alias="clave" value="{$lstSel/@clave}" /> </div>
                               </div>
                               <div class = "registro_fila">
                                     <div class = "registro_form_eti cli-lst-tipo-eti"> Tipo:</div>
                                     <div class = "registro_form_campo cli-lst-tipo-inp">
                                           <select name="tipo">
                                                 <option value = "pub" ><xsl:if test="$lstSel/@tipo='pub'" ><xsl:attribute name="SELECTED" >SELECTED</xsl:attribute></xsl:if> Publica</option>
                                                 <option value = "pri" ><xsl:if test="$lstSel/@tipo='pri'" ><xsl:attribute name="SELECTED" >SELECTED</xsl:attribute></xsl:if> Privada</option>
                                           </select>
                                     </div>
                               <div class='consulta-btn'>
                                     <div colspan='2' class='fcon_form_btn'>
                                           <button type="button" onclick="ShopOnline.Cliente.crearLista('cli-lst-formulario',this)" >@@etiB_enviar@@</button>
                                     </div>
                               </div>
                               </div>
                         </form>
                   </div>
             </div>
       </xsl:template>
</xsl:stylesheet>