<?php

	class HTMLHelp {
		public function print_table($arr) {			
			$table = "<table>
						<thead>
							<tr>";

			foreach(array_keys($arr[0]) as $key) {
				$table .= "<td>$key</td>";
			}

			$table .= "		</tr>
						</thead>
						<tbody>";

			foreach($arr as $row) {
				$table .= "<tr>";
				foreach($row as $col) {
					$table .= "<td>$col</td>";
				}
				$table .= "</tr>";
			}

			$table .= "</tbody>
					</table>";

			return $table;
		}

		public function print_select($name, $arr) {
			$html = "<select name='$name'>";
			foreach($arr as $element) {
				$html .= "<option value='$element'>$element</option>";
			}
			return $html;
		}
	}

	$html = new HTMLHelp();
	$arr = [array("first_name" => "Jun", "last_name" => "Kim", "nick_name" => "JJ"),
			array("first_name" => "Jun", "last_name" => "Kim1", "nick_name4" => "DD"),
			array("first_name" => "Jun", "last_name" => "Kim2", "nick_name5" => "LL"),
			array("first_name" => "Jun", "last_name" => "Kim3", "nick_name6" => "KK")];
	echo $html->print_table($arr);

	$sample_arr = ["CA", "WA", "UT", "TX", "AZ", "NY"];
	$form = new HTMLHelp();
	echo $form->print_select("state", $sample_arr);
?>