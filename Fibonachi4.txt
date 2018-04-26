<!--http://www.cyberforum.ru/php-beginners/thread550412.html -->
<p>Введите число N от 1 до 10:</p>
<form name="authForm" method="POST" action="<?=$_SERVER['PHP_SELF']?>">        
    n:<input type="number" name="n">   
<input type="submit">
</form>

<?php     
    echo "<b>Количество элементов ряда:</b>"; 
    print_r($_POST); echo "<br>";
    
    $n=$_POST['n']; /*Получаем N c клавиатуры. */
    $Fn2=1;
    $Fn1=1;
    $Fn=2;   
    $S=4;
    $fib=[]; /*Определим массив для чисел Фибоначчи */
    
    if($n==1){        
        $Fn2=1;
        echo "<br><b>Ряд Фибоначи:</b>"; echo $Fn2;        
        echo "<br> Сумма ряда: S="; $S=1; echo $S;  
        echo "<br> Среднее Геометрическое: G="; $G=1; echo $G;
        echo "<br> Среднее Арифметическое: A="; $A=$S/$n; echo $A;
        }   
    elseif ($n==2){
        echo "Для n="; echo $n;
        echo "<br><b>Ряд Фибоначчи:</b>"; $Fn2=1; echo $Fn2;echo ","; $Fn1=1; echo $Fn1;echo "<br><br>";
        echo "Cумма чисел Фибоначчи s ="; $S=2; echo $S; 
        echo "<br>Cреднее арифметическое.A="; $A=$S/$n; print $A;
        echo "<br> Среднее  Геометрическое G="; $G=1; echo $G;
        }
    elseif ($n==3){
        echo "<br> Начальные значения";
        $Fn2=1; 
        $Fn1=1; 
        $fib = array("1", "1");         
        $S=2; /*Среднее Арифметическое */
        $G=1; /*Среднее Геометрическое */
        echo "<br><b>Ряд Фибоначчи:</b><br>";
        echo "Fn-1="; print $Fn1;echo "<br>";       
        echo "Fn-2="; print $Fn2;echo "<br>";
        echo "Fn=";   $Fn=$Fn1+$Fn2; print $Fn; echo "<br>";         
        array_push($fib, $Fn);
        print_r($fib ); echo "<br>";  
    }
    else{
    array_push($fib,"$Fn2","$Fn1","$Fn");    
    
    for ($i = 4; $i <= $n; $i++) {
        echo "<b>Шаг </b>"; print($i);echo "<br>";
        /* Общая формула */
        /* 1 1 2 3*/ /*s=7*/    
        /* 1 1 2 3 5 */ /*s=12*/ 
        /* 1 1 2 3 5 8*/ /*s=20*/ 

        /* Число на 3 шага влево от задуманного (последнего) числа Фибоначчи */
        echo "Fn-3="; print $Fn2;echo "<br>";
        
        /* Число на 2 шага влево от задуманного числа Фибоначчи */
        $Fn2=$Fn1;        
        echo "Fn-2="; print $Fn2;echo "<br>";       
        
        /* Число на 1 шаг влево от задуманного числа Фибоначчи */              
        $Fn1=$Fn;
        echo "Fn-1="; print $Fn1;echo "<br>";       
        
        /* Последнее число Фибоначчи */
        $Fn=$Fn1+$Fn2;
        echo "Fn="; print $Fn; echo "<br><br>";
             
        $fib[]=$Fn;                
        $S=$S+$Fn;         
    }
    echo " Сумма чисел  S="; print $S;     echo "<br>"; 
    echo "Ряд Фибоначчи:<br>";     
    print_r($fib); echo "<br>";
    }
    
?>
<!--
    $G=$G*$Fn; /*Среднее Геометрическое, промежуточное значение.корень не извлечен*/                      
    $H=n/(1/$Fn2+1/$Fn1+1/$Fn); /*Среднее Гармоническое*/
            $H2=i/(1/$Fn2+1/$Fn1);
            $H=1/$Fn2+1/$Fn1+1/$Fn; /* 1/1+1/2+1/3 */

            /*Среднее Квадратическое*/
            $SK=$Fn2+$Fn1;                
            }

            /*i=3*/
            $kvadFn2=pow($Fn2, 2);
            $kvadFn1=pow($Fn1, 2);
               
            /*i=3*/
            $SUMkvadFn=pow($Fn, 2)+pow($Fn2, 2)+pow($Fn1, 2);
            /*1 1 2  $SUMkvadFn=1+1+4=6 */
            
            /*i=4*/
            $A=$S/$n; /*  - найти Среднее Арифметическое*/
            echo "<br>Cреднее арифметическое.A=";
            print $A;
                        
            $G=pow($G, n); /*http://php.net/manual/ru/function.pow.php */
            echo "<br>Cреднее геометрическое.G=";
            echo  $G; /* Разница ??*/ -->