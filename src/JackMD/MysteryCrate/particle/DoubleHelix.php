<?php
declare(strict_types=1);

/*
___  ___          _                  _____           _
|  \/  |         | |                /  __ \         | |
| .  . |_   _ ___| |_ ___ _ __ _   _| /  \/_ __ __ _| |_ ___
| |\/| | | | / __| __/ _ \ '__| | | | |   | '__/ _` | __/ _ \
| |  | | |_| \__ \ ||  __/ |  | |_| | \__/\ | | (_| | ||  __/
\_|  |_/\__, |___/\__\___|_|   \__, |\____/_|  \__,_|\__\___|
		 __/ |                   __/ |
		 |___/                   |___/  Bởi @JackMD cho PMMP


MysteryCrate, một plugin thùng cho PocketMine-MP
Bản quyền (©) 2018 JackMD <https://github.com/JackMD>

Discord: JackMD#3717
Twitter: JackMTaylor_

Phần mềm này được phân phối theo "Giấy phép Công cộng GNU v3.0".
Giấy phép này cho phép bạn sử dụng hoặc sửa đổi nó nhưng bạn không được phép
bán plugin này với bất kỳ giá nào. Nếu bị phát hiện làm như vậy, một
hành động cần thiết bắt buộc sẽ được thực hiện.

MysteryCrate được phân phối với hy vọng rằng nó sẽ hữu ích,
nhưng KHÔNG CÓ BẤT KỲ BẢO HÀNH NÀO; mà không có bảo hành ngụ ý
KHẢ NĂNG PHÁT TRIỂN HOẶC PHÙ HỢP VỚI MỤC ĐÍCH CỤ THỂ. Xem
Giấy phép Công cộng GNU v3.0 để biết thêm chi tiết.

Bạn sẽ nhận được một bản sao của Giấy phép Công cộng GNU v3.0
cùng với chương trình này. Nếu không, hãy xem
<https://opensource.org/licenses/GPL-3.0>.
-----------------------------------------------------------------------
*/

namespace JackMD\MysteryCrate\particle;

use JackMD\MysteryCrate\Main;
use pocketmine\level\particle\FlameParticle;
use pocketmine\math\Vector3;
use pocketmine\scheduler\Task;

class DoubleHelix extends Task{

	/** @var Main */
	private $plugin;
	/** @var Vector3 */
	private $pos;

	/**
	 * DoubleHelix constructor.
	 *
	 * @param Main    $plugin
	 * @param Vector3 $pos
	 */
	public function __construct(Main $plugin, Vector3 $pos){
		$this->plugin = $plugin;
		$this->pos = $pos;
	}

	/**
	 * @param int $tick
	 */
	public function onRun(int $tick){
		$level = $this->plugin->getServer()->getLevelByName((string) $this->plugin->getConfig()->get("crateWorld"));
		$cpos = $this->pos;
		for($i = 5; $i > 0; $i -= 0.1){
			$radio = $i / 3;
			$x = $radio * cos(3 * $i);
			$y = 5 - $i;
			$z = $radio * sin(3 * $i);
			$level->addParticle(new FlameParticle($cpos->add($x, $y, $z)));
		}
		for($i = 5; $i > 0; $i -= 0.1){
			$radio = $i / 3;
			$x = -$radio * cos(3 * $i);
			$y = 5 - $i;
			$z = -$radio * sin(3 * $i);
			$level->addParticle(new FlameParticle($cpos->add($x, $y, $z)));
		}
	}
	
}