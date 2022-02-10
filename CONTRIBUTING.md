# CONTRIBUTING

This contributing doc has two sections, identified by H2 headings: "Development" and "Contributing to content".  Please keep in mind that if you plan to actually issue pull requests that are aimed at improving content, *all* of the stuff under "Development" apply as well. 

## Development
Do *not* do any work in `dist`. It will be overwritten by Grunt tasks!

* Do not do work in the `master` branch. 
* Create an issue in this repository. 
* Fork this repository to your own copy
* Create a new feature branch in your repo to work in
* Issue a pull request with your work.

### Client-specific development

Do *not* do any customization work for a specific client within this repository! Fork it into its own repository and use that for your customizations.

If you find that you've added content to your client-specific version that should be in the master, please be sure to issue a pull request with your improvements. This benefits everyone.

### Installation

#### Requirements
Development requires that you have Node, Grunt, and Sass installed on your machine. 

#### Install
* Fork the repo
* From terminal/ command prompt: 
  * `npm install`
  * `gem install sass`

This will install everything you need, including all dependencies.

#### Serve
To serve this content on your local machine, all you need to do is go into terminal/ command prompt and type `npm run build`.  This will run a final build and allow you to serve the Training website on your machine simply by pointing your browser at http://localhost:3000

### Develop Slideshow 

All of the slideshow development takes place in the `/shower/` folder - specifically in `/shower/themes/tenon/` which includes folders for `styles`, `pictures`, `js`, `images`, and `fonts`.  

*All* of the slideshow development needs to take place here as the "single source of truth" for the slide design.  This may seem non-intuitive at first, but this "master copy" is used at build time to build the lessons.  By doing so, we retain the ability to improve the appearance and behavior of all of the training topics at once while also allowing each of them to also be customized as needed.

#### Sass

The "theme" for the slideshow(s) is created with Sass. Each of the sass files are compiled at build time to create a single CSS file. They are located in the `/sass/slides/` folder

**NOTE** Many of the files located in `/sass/` are also used by the theme.

#### JavaScript

Do not modify the Shower script itself, located at `/shower/shower.min.js`. It is a terrible idea, because it will mean we cannot bring in new versions of Shower as that project evolves.

Instead, our custom JS resides in `/global_assets/`.  There you'll find a handful of JS files that add/ enhance functionality without breaking Shower. Any new *global*  slide functionality should be added to the `theme.js` file.

Scripts from 3rd parties are pulled in via NPM.

At build time, all of this stuff is brought together, compiled, minified, and copied into their proper locations. All of that is then copied directly into each lesson folder

#### Per topic slideshow customization

Any truly custom one-off stuff can be done as part of lesson content development. Please be mindful to keep everything DRY. Anything you find being duplicated across topics should be added to the slideshow theme.

## Contributing to Content

* Each lesson exists in its own folder within `/src/`.  
* Each lesson's slides are located within `/src/TOPIC/slides/`.
* All assets specific to that lesson should be included in the lesson's slide folder. For instance, images would go in `/src/TOPIC/slides/images/`

NOTE: The slide deck content should consist solely of slides themselves.  Here's the basic structure of a slide:

```
<section class="slide">
  <div>
    <h2>SLIDE HEADER</h2>
    <p>
      SLIDE CONTENT
    </p>
    <div class="transcript">
      SLIDE TRANSCRIPT
    </div>

  </div>
</section>
```

You should inspect the existing slide decks to learn tips and tricks of creating content in this format.

### Split content 50/50

```
   <div class="half float-left">

    </div>

    <div class="half float-right">

    </div>
```

### Code examples

Code examples must follow the below convention:

```
<div class="example">
  <div class="example-output">
    CODE GOES HERE
  </div>
</div>
```

#### Real-world example:

```
<div class="example">
  <div class="example-output">
    <input type="checkbox" id="notify" name="notify" value="on">  
    <label for="notify">Notify by email</label>  
  </div>
</div>
```

All of the show-hide magic for code view vs. output will be done for you


### Contributing without coding
You don't have to actually modify code to contribute. Critique/ suggestions are welcome

* Create a new Github issue for each bug or improvement
* Ensure the issue title is clear and concise
* Provide a detailed description of exactly what should be changed/ added/ removed including, where possible, the *exact* location and any other details necessary to make the modifications.
* If possible, provide exact code for changes or, even better, a pull request with the changes.

Please understand that a lack of clarity and completeness is likely to be met with an immediate response asking for the missing details. In other words, missing details will only delay the improvements from being made as we prioritize things that are immediately actionable over things which aren't.
