Rama principal de desarrollo.

De esta rama, cuelgan las siguientes:
aemonge (developer)
adrian (developer)
luis (developer)
webTeam (equipo)

Descripcion a modo arbol:

  master 							(rama de versiones realease y live. version beta)
    |  develop 						(rama de desarrollo estable de donde los desarrolladores para crear nuevas cosas. version alfa)
    |---->|     web 				( rama para el equipo web. version en produccion )
    |     |-------->| 
    |     |         |-------->|  	una funcionalidad web
	|     | 		| 		  |
	|     | 		|<--------|  	cierra de funcionalidad web
	|     |<--------| 			 	TEST pasado
	|     |
	|	  |      	aemonge 		( rama para el desarrollador ruby Andres. version en produccion )
    |     |----------->| 
	|     | 	   	   |
	|     | 		   |
    |     |            |-------->|  una funcionalidad de aemonge
	|     | 		   |<--------|  cierre de funcionalidad de aemonge
	|     |<-----------| 			TEST pasado
	| 	  | 		   |-------->|  otra funcionalidad de aemonge
	|     |
	|	  |       			adrian  ( rama para el desarrollador ruby Adrian. version en produccion )
    |     |------------------>| 
	|     | 				  |
	|     | 				  |
    |     |         		  |-------->|  una funcionalidad de adrian
	|     | 				  | 		|
	| 	  | 				  |<--------|  cierre de funcionalidad de adrian
	|     | 				  |
	|     | 				  |
    |     |         		  |-------->|  otra funcionalidad de adrian
	|     | 				  | 		|
	| 	  | 				  |<--------|  cierre de otrafuncionalidad de adrian
	|     |<------------------| 		   TEST pasado
	|     |
    |     |     web 			( rama para el equipo web. version en produccion )
    |     |-------->| 
    |     |         |-------->|  una funcionalidad web con nuevas funcionalidades de programacion
	|     | 		| 		  |
	|     | 		|<--------|  cierra de funcionalidad web
	|     |<--------| 			 TEST pasado
	|     |
	|	  |      					 luis   		( rama para el desarrollador ruby Andres. version en produccion )
    |     |-------------------------->| 
	|     | 						  |
	|     | 						  |
    |     |         				  |-------->|  una funcionalidad de luis
	|     | 						  | 		|
	| 	  | 						  |<--------|  cierre de funcionalidad de luis
	|     |<--------------------------| 		   TEST pasado
	|	  |      	aemonge 		( rama para el desarrollador ruby Andres. version en produccion )
    |     |----------->| 
	|     | 	   	   |
	|     | 		   |
    |     |            |-------->|  una funcionalidad de aemonge basado en lo desarrollado por luis
	|     | 		   |
	|     |<-----------| 			TEST pasado

##################################################### (fin de desarrollo, pruebas antes del sprint)

	|     |       web
	| 	  |------->| 				Arreglo rapido 
	| 	  |<-------| 				TEST PASADO
	|     |
	|	  |      					 luis
    |     |-------------------------->|  Arreglo rapido
	|     | 						  |
	|     | 						  |
    |     |         				  |-------->|  una funcionalidad de luis
	|     | 						  | 		|
	| 	  | 						  |<--------|  cierre de funcionalidad de luis
	|     |<--------------------------| 		   TEST pasado
	|     |

##################################################### (fin de pruebas y del sprint)

	|<----| (master version 0.2)
