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
use pocketmine\level\particle\HappyVillagerParticle;
use pocketmine\math\Vector3;
use pocketmine\scheduler\Task;

class Ting extends Task{

	/** @var Main */
	private $plugin;
	/** @var Vector3 */
	private $pos;

	/**
	 * Ting constructor.
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
        $time = 0;
        $pi = 3.14159;
        $time += $pi / 2;
        for ($i = 0; $i <= 50; $i += $pi / 16) {
            $radio = 1.5;
            $x = $radio * cos($i) * sin($time);
            $y = $radio * cos($time) + 1.5;
            $z = $radio * sin($i) * sin($time);
            $level->addParticle(new HappyVillagerParticle($cpos->add($x, $y - 1, $z)));
        }
    }
}