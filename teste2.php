<?php
// 1 Crie um array
$array = [];
// 2 Popule este array com 7 números 
for ($i = 0; $i <= 7; $i++) {
	$array[] = rand(1, 25);
}

// 3 Imprima o número da posição 3 do array
echo $array[2];
echo '<br>';

/**  
 * Crie uma variável com todas as posições do array 
 * no formato de string separado por vírgula
 */
$arrayValues = implode(',', array_values($array));

/** 
 *  Crie um novo array a partir da variável no 
 * formato de string que foi criada e destrua o array anterior
 */
$newArray = explode(',', $arrayValues);
unset($array);

//Crie uma condição para verificar se existe o valor 14 no array
if (in_array("14", $newArray)) {
	echo 'tem';
} else {
	echo 'não tem';
}

/**
 * Faça uma busca em cada posição. 
 * Se o número da posição atual for menor que o da posição anterior 
 * (valor anterior que não foi excluído do array ainda), 
 * exclua esta posição
 */

echo '<br>';

for($i =0; $i <= count($newArray); $i++){	
	if($newArray[$i] < $newArray[$i-1]){
		unset($newArray[$i]);
	}
}
print_r($newArray);
echo '<br>';

// Remova a última posição deste array
array_pop($newArray);
print_r($newArray);
echo '<br>';

// Conte quantos elementos tem neste array
echo 'Quantidade de elementos no array: '.count($newArray);
echo '<br>';
print_r($newArray);
echo '<br>';

// Inverta as posições deste array
print_r(array_reverse($newArray))
?>
