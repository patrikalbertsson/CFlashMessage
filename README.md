# CFlashMessage

<img alt="build:passed" src="https://travis-ci.org/patrikalbertsson/CFlashMessage.svg" />
<img alt="Scrut" src="https://scrutinizer-ci.com/g/patrikalbertsson/CFlashMessage/badges/quality-score.png?b=master" />
<img alt="CodeCoverage" src="https://scrutinizer-ci.com/g/patrikalbertsson/CFlashMessage/badges/coverage.png?b=master" />

This is an module for simple flash-messages. It contains in general three functions:


<code>setFlash('type', 'message')</code>: Types allowed: success, notice, warning and error.

<code>hasFlash()</code>: Returns true if flash is set, else false.

<code>getFlash()</code>: Get flashMessage.

## How to use CFlashMessage

### 1. Install via composer
Install CFlashMessage via packagist and composer. Add

    "require": {
        "php": ">=5.4",
        "paaa14/c-flash-message" : "dev-master"
    },
    
in your <code>composer.json</code>.

### 2. Set FlashMessage-class

Set flashMessage in your base class implementing Dependency Injection / Service Locator- file. If you are using Anax-MVC, ex.

File:<code>src/DI/CDIFactoryDefault.php</code>

Add <code>$this->setShared('flashMessage', '\Anax\FlashMessage\CFlashMessage')</code> (you maybe want to change the namespace for <code>CFlashMessage.php</code>)

### 3. Implement code in your template-file

File: <code>theme/anax-base/index.tpl.php</code>

In your div#main, put code:

    <?php if($this->flashMessage->hasFlash()) : ?> 
        <?php $message = $this->flashMessage->getFlash(); ?>
        <div class="<?=$message['type']?>"><?=$message['message']?></div>
    <?php endif; ?>
    
to see if flash has been set. If it returns true, show flashMessage.

Exemple:

    <div id='main'>
    <?php if(isset($main)) echo $main?>
    <?php $this->views->render('main')?>
    <?php if($this->flashMessage->hasFlash()) : ?> 
        <?php $message = $this->flashMessage->getFlash(); ?>
        <div class="<?=$message['type']?>"><?=$message['message']?></div>
    <?php endif; ?>
    </div>

### 4. Add stylesheet
Copy <code>flash.css</code> to your css-archive and be sure that <code>flash.css</code> is activated in your framework.

### 5. Session
Be sure that Sessions is activated in your framework. If you <code>var_dump($_SESSION)</code> you should have an empty session. If you are using Anax-MVC you 
might have to start the session manually i your frontcontroller.

Put <code>$app->session()</code> in the top of your controller, after you assign <code>$app</code>

### 6. Router
Make sure your framework handles routes. If you are using Anax-MVC, put <code>$app->router->handle()</code> in the bottom of your frontcontroller, before it's being sent to render.

### 7. Create routes and use FlashMessage

Exemple in Anax-MVC:

    $app->router->add('', function() use ($app) {
        $app->flashMessage->setFlash('success', "Success! Update page to make this message disappear.");
        $app->views->addString('Flash is set, click on the link to view the flash', 'main');  
        $app->views->addString("<a href='" . $app->url->create('flash') . "'>Link</a>", 'main');
    });

    $app->router->add('flash', function() use($app) {
        $app->views->addString('In your template-file, there is a if-statement that checks if a flash has been set. If it returns TRUE, this message is shown. Update page to remove this message.');
    });
    

To get  Anax-MVC, visit: https://github.com/mosbth/Anax-MVC

Enjoy :)

