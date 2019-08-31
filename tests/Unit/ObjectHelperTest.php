<?php


namespace Tests\Unit;


use App\GroupSource;
use App\Helpers\ObjectHelper;
use Illuminate\Support\Collection;
use stdClass;
use Tests\TestCase;

class ObjectHelperTest extends TestCase
{
    public function testConvertObject()
    {
        $object = new Collection();
        $object->name = 'jon';
        $object->years = 25;
        $convertMap = [
            'userData' => function (Collection $object) {
                return ObjectHelper::convertObject($object, [
                    'name',
                    'old' => 'years'
                ]);
            }
        ];
        $convertObject = ObjectHelper::convertObject($object, $convertMap);
        $this->assertObjectHasAttribute('userData', $convertObject);
        $this->assertObjectHasAttribute('name', $convertObject->userData);
        $this->assertObjectHasAttribute('old', $convertObject->userData);
        $this->assertEquals('jon',$convertObject->userData->name);

        $object = new stdClass();
        $object->years = 20;
        $convertMap = [
            'userData' => function (stdClass $object) {
                return ObjectHelper::convertObject($object, [
                    function () {
                    },
                    'old' => 'years'
                ]);
            }
        ];
        $convertObject = ObjectHelper::convertObject($object, $convertMap);
        $this->assertObjectNotHasAttribute('name', $convertObject->userData);

        $object = new GroupSource();
        $object->group = 'ksk';
        $object->course = 2;
        $convertMap = [
          'groupData' => function(GroupSource $model) {
            return ObjectHelper::convertObject($model, [
                'group',
                'course'
            ]);
          }
        ];
        $convertObject = ObjectHelper::convertObject($object,$convertMap);
        $this->assertNotEmpty($convertObject->groupData);
    }
}
