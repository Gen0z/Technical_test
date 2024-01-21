<!DOCTYPE html>
<html>
<head>
    <title>Tugas</title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <label for="iterations">Masukkan Input:</label>
    <input type="number" id="iterations" name="iterations" min="1" required>
    <button type="submit" name="submit">Submit</button>
</form>

<?php
class LoopExample {
    private $iterations;
    private $bageCount = 0;
    private $concatCount = 0;
    private $bageConcatCount = 0;

    public function __construct($iterations) {
        $this->iterations = $iterations;
    }

    public function run() {
        for ($i = 1; $i <= $this->iterations; $i++) {
            if ($this->bageConcatCount < 5) {
                if ($this->isMultipleOf3($i) && $this->isMultipleOf5($i)) {
                    echo "Bage Concat ";
                    $this->bageConcatCount++;
                    $this->bageCount++;
                    $this->concatCount++;
                } elseif ($this->bageConcatCount < 2 && $this->isMultipleOf3($i)) {
                    echo "Bage ";
                    $this->bageCount++;
                } elseif ($this->bageConcatCount < 2 && $this->isMultipleOf5($i)) {
                    echo "Concat ";
                    $this->concatCount++;
                } elseif ($this->bageConcatCount >= 2 && $this->isMultipleOf3($i)) {
                    echo "Concat ";
                    $this->concatCount++;
                } elseif ($this->bageConcatCount >= 2 && $this->isMultipleOf5($i)) {
                    echo "Bage ";
                    $this->bageCount++;
                } else {
                    echo $i . " ";
                }
            } else {
                break;
            }
        }
    }

    private function isMultipleOf3($number) {
        return $number % 3 === 0;
    }

    private function isMultipleOf5($number) {
        return $number % 5 === 0;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = $_POST["iterations"];
    $loopExample = new LoopExample($input);
    $loopExample->run();
}
?>
</body>
</html>
