<?php
/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="masks_on_web",
 * )
 */
/**
 * @OA\Get(
 *      path="/masks_on_web",
 *      operationId="get_masks_on_web",
 *      tags={"masks_on_web"},
 *      summary="masks_on_web輸入樣式",
 *      description="顯示輸入畫面樣式",
 *      @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *       @OA\Response(response=400, description="Bad request"),
 *     )
 *
 * Returns list of projects
 */

/**
 * @OA\Get(
 *      path="/masks_on_web/show",
 *      operationId="getProjectById",
 *      tags={"masks_output"},
 *      summary="masks_on_web輸出樣式",
 *      description="顯示輸出畫面樣式",
 *      @OA\Parameter(
 *          name="address",
 *          description="Input address",
 *          required=false,
 *          in="query",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *      @OA\Response(response=400, description="Bad request"),
 *      @OA\Response(response=404, description="Resource Not Found"),
 *      security={
 *         {
 *             "oauth2_security_example": {"write:projects", "read:projects"}
 *         }
 *     },
 * )
 */
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class masks_on_web extends Controller{
    public function masks_user_input_page(){
        return view("masks_on_web");
    }
    
    public function masks_output_page(Request $request){
        $user_input = $request->input('address');
        return view("masks_output")->with('re',$this->search($user_input));
    }
    public function download_csv(){
        $masks_csv=file_get_contents('http://data.nhi.gov.tw/Datasets/Download.ashx?rid=A21030000I-D50001-001&l=https://data.nhi.gov.tw/resource/mask/maskdata.csv', 0);
        return $masks_csv;
    }
    public function search($user_input){
        $masks_csv=$this->download_csv();
        $masks_csv=explode("\n",$masks_csv);
        $output_masks_information=[];
        array_shift($output_masks_information);
        for($i=1;$i<count($masks_csv);$i++){
            $str_array=explode(",",$masks_csv[$i]);
            if(@strstr($str_array[2],$user_input)){
                $output_masks_information[]=$str_array;
            }
        }
        usort($output_masks_information, function($less,$more){
            return $less[4]<$more[4];
        });
        return $output_masks_information;
        
    }
}