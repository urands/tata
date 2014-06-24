<?

use Illuminate\Support\ServiceProvider;

class Tata\Core extends ServiceProvider {

    public function register()
    {
        $this->app->bind('foo', function()
        {
            return new Foo;
        });
    }

}


?>