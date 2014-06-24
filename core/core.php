<?

use Illuminate\Support\ServiceProvider;

class Core extends ServiceProvider {

    public function register()
    {
        $this->app->bind('foo', function()
        {
            return new Foo;
        });
    }
	
	public function test(){
	   
	   echo "core send";
	
	}

}


?>