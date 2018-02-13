<html>
  <head>
    <link rel="stylesheet" href="css/reveal.css">
    <link rel="stylesheet" href="css/theme/sky.css">
    <link rel="stylesheet" href="css/custom.css">
  </head>
  <body>
    <div class="reveal">
      <div class="slides">
        <section>
          <h1>Migration in Drupal 8 :</h1>
          How to do migration in Drupal 8 site?
          <br>
          <br>
          <br>
          <h3>Yogesh Pawar</h3>( @yogeshmpawar )
        </section>
        <section>
          <h2>Who am I?</h2>
          <br>
          <div style="text-align: left">
            <ul>
              <li>Yogesh Pawar <strong>( @yogeshmpawar )</strong></li>
              <li>From Pune, India</li>
              <li>Drupal Developer (QED42)</li>
              <li>
                <a href="https://twitter.com/yogeshmpawar">Twitter</a> |
                <a href="https://www.drupal.org/u/yogesh-pawar">Drupal.org</a> |
                <a href="https://github.com/yogeshmpawar">Github</a>
              </li>
            </ul>
          </div>
        </section>
        <section>
          <h2>Who are you?</h2>
          <ul>
            <li>Drupal 7 developer</li>
            <li>Drupal 8 beginner</li>
            <li>Migration Enthusiast</li>
          </ul>
        </section>
        <section>
          <h2>Overview</h2>
          <br>
          <div style="text-align: left">
            <ul>
              <li>What is migration</li>
              <li>Migrate from anywhere</li>
              <li>Benefits of using Automatic migration over traditional copy/paste</li>
              <li>Migration using contributed modules</li>
              <li>Brief overview of Migration</li>
            </ul>
          </div>
        </section>
        <section>
          <section>
            <h2>What is migration</h2>
          </section>
          <section>
            <ul>
              <li>"migration" is the process that seeks to take data from some source external to the current Drupal 8 site</li>
              <li>use it to automatically create nodes, users, configuration, and any other component of your site.</li>
            </ul>
          </section>
          <section>
            <h3>In short, automating the tedious job of copying and pasting.</h3>
          </section>
        </section>
        <section>
          <section>
            <h2>Migrate from anywhere</h2>
          </section>
          <section>
            <h3>The migration system makes it possible to pull content into Drupal from anywhere.</h3>
          </section>
          <section>
            <h3>The core API supports extraction from any SQL data source, including previous versions of Drupal like Drupal 6 & Drupal 7. </h3>
          </section>
          <section>
            <h3>Some of the contributed modules like migrate_plus extend this system to support other data types like CSV, XML & JSON.</h3>
          </section>
          <section>
            <h3>Some of the existing data sources include:</h3>
            <ul>
              <li>MySQL, MariaDB</li>
              <li>Previous versions of Drupal</li>
              <li>CSV</li>
              <li>JSON, you could even use a REST endpoint</li>
              <li>XML</li>
              <li>Etc.</li>
            </ul>
          </section>
          <section>
            <h3>Apart from this if you need to extract data from your data source you can write a custom source plugin.</h3>
          </section>
        </section>
        <section>
          <section>
            <h2>Benefits of using Automatic migration over traditional copy/paste - </h2>
          </section>
          <section>
            <img data-src="images/cost_to_migrate.png">
          </section>
        </section>
        <section>
          <section>
            <h2>Migration using contributed modules</h1>
          </section>
          <section>
            <h3>Migrate Tools -</h3>
            <h5>Project page: https://www.drupal.org/project/migrate_tools</h5>
            <ul>
              <li>Provides Drush commands for running and rolling back custom migrations.</li>
              <li>Drupal core does not provide a means for running custom migrations at the moment,</li>
              <li>If you want to run any custom migrations either via Drush or the UI you'll want to install this module.</li>
            </ul>
          </section>
          <section>
            <h3>Migrations can be handled by below drush commands</h3>
            <ul>
              <li>migrate-status  - Lists migrations and their status.</li>
              <li>migrate-import - Performs import operations.</li>
              <li>migrate-rollback - Performs rollback operations.</li>
              <li>migrate-stop - Cleanly stops a running operation.</li>
              <li>migrate-reset-status - Sets a migration status to Idle if it's gotten stuck.</li>
              <li>migrate-messages - Lists any messages associated with a migration import.</li>
            </ul>
          </section>
          <section>
            <h3>Migrate Plus -</h3>
            <h5>Project page: https://www.drupal.org/project/migrate_plus</h5>
            <ul>
              <li>Extends the core Migrate framework to add additional useful functionality.</li>
              <li>URL source plugin can be used as a starting point for importing from XML, JSON, and SOAP data sets.</li>
              <li>migrate_example, and migrate_example_advanced which demonstrate how you can write source, destination and process plugins as well as migration plugins.</li>
            </ul>
          </section>
          <section>
            <h3>Migrate Upgrade -</h3>
            <h5>Project page: https://www.drupal.org/project/migrate_upgrade</h5>
            <ul>
              <li>Provides Drush commands for running Drupal-to-Drupal migrations.</li>
              <li>Using the Drush commands to run migrations has proven to be more reliable than the UI.</li>
              <li>You have to install this module if you're migrating from an older version of Drupal.</li>
              <li>If you're migrating from a non-Drupal source you won't need this module.</li>
            </ul>
          </section>
        </section>
        <section>
          <section>
            <h2>Brief overview of Migration</h2>
          </section>
          <section>
            <ul>
              <li>We can start with the migration from XML data source to Drupal 8 site</li>
              <li>Create a custom module named d8_migrations & create a yml file in d8_migrations/config/install directory</li>
            </ul>
          </section>
          <section>
            <h2>Configurations in YAML file</h2>
          </section>
          <section>
            <h3>id: users_content</h3><br>
            <h4>The machine name for a migration, used to uniquely identify it.</h4>
          </section>
           <section>
            <h3>label: Users content</h3><br>
            <h4>A human-friendly description of the migration.</h4>
          </section>
          <section>
            <h3>migration_group: default</h3><br>
            <h4>The machine name of the group containing this migration.</h4>
          </section>
          <section>
            <h3>Source:</h3><br>
            <h4>Every migration must have a source plugin, which controls the delivery of our source data.</h4>
            <h4>Below are two examples of source plugin</h4>
          </section>
          <section>
            <h3>Migrating xml into drupal 8</h3>
            <ul>
              <li>plugin: url (This is one or more fully-qualified URLs or file paths.)</li>
              <li>urls: "users.xml" (Path of the xml file.)</li>
              <li>data_fetcher_plugin: http (plugin for data fetchingof xml file.)</li>
              <li>data_parser_plugin: xml (plugin for data parsing of xml file.)</li>
              <li>item_selector: /users/user (In users.xml, <users> is the outer element, and each item we want to import is a <user> element.)</li>
              <li>Fields: (Under 'fields', we list the data items to be imported which includes name, label & selector.)</li>
              <li>Ids: (Under 'ids', we identify source fields populated above which will uniquely identify each imported item.)</li>
            </ul>
          </section>
          <section>
            <h3>Migrating csv into drupal 8</h3>
            <ul>
              <li>plugin: csv</li>
              <li>path: '/path/to/file/articles.csv'(Full path to the csv file.)</li>
              <li>delimiter: ',' (Column delimiter. Comma (,) by default.)</li>
              <li>enclosure: '"' (Field enclosure. Double quotation marks (") by default.)</li>
              <li>header_row_count: 1 (The number of rows at the beginning which are not data.)</li>
              <li>keys: - id (The column(s) to use as a key. Each column specified will create an index in the migration table.)</li>
              <li>column_names: (identify the columns of interest in the source file, Each numeric key is the 0-based index of the column.)</li>
            </ul>
          </section>
          <section>
            <h3>Process: </h3><br>
            <h4>Process plugin simply copies the source value to the destination field.</h4>
          </section>
          <section>
            <h3>entity_lookup</h3><br>
            <h4>Allows you to match source data to existing Drupal 8 entities and return their IDs (primarily for populating entity reference fields).</h4>
          </section>
          <section>
            <h3>entity_generate</h3><br>
            <h4>Extends entity_lookup to actually generate an entity from the source data where one does not already exist.</h4>
          </section>
          <section>
            <h3>file_blob</h3><br>
            <h4>Allows you to create a file (and corresponding file entity) from blob data.</h4>
          </section>
          <section>
            <h3>merge</h3><br>
            <h4>Allows you to merge multiple source arrays into one array.</h4>
          </section>
          <section>
            <h3>skip_on_value</h3><br>
            <h4>Like core's skip_on_empty, but allows you to skip either the row or process upon matching (or not) a specific value.</h4>
          </section>
          <section>
            <h3>transliteration</h3><br>
            <h4>process strings through the transliteration service to remove language decorations and accents. Especially helpful with file names.</h4>
          </section>
          <section>
            <h3>Destination:</h3><br>
            <h4>Every migration must also have a destination plugin, which handles writing the migrated data in the appropriate form for that particular kind of data.</h4>
          </section>
          <section>
            <h3>destination config plugin:</h3><br>
            <h4>The config plugin allows for creating raw configuration objects.</h4>
            <ul>
              <li>destination:</li>
              <li>&nbsp;&nbsp;plugin: config</li>
              <li>&nbsp;&nbsp;config_name: book.settings</li>
            </ul>
          </section>
          <section>
            <h3>destination entity plugin:</h3><br>
            <h4>The entity plugin allows for creating raw entity objects like user, node & taxonomy term.</h4>
            <ul>
              <li>destination:</li>
              <li>&nbsp;&nbsp;plugin: entity:user</li>
              <li>&nbsp;&nbsp;md5_passwords: true</li>
            </ul>
          </section>
          <section>
            <h3>migration_dependencies: {}</h3><br>
            <ul>
              <li>nodes have references to terms and users, so we want those to be imported first.</li>
              <li>We make that dependency explicit here - by putting those migrations under the 'required' key.</li>
            </ul>
          </section>
        </section>
        <section>
          <h1>Thank You!</h1>
          <h3>Questions || Discussions?</h3>
        </section>
      </div>
    </div>
    <script src="js/reveal.js"></script>
    <script>
      Reveal.initialize({
        width: "80%",
        height: "100%",
        margin: 0,
        minScale: 1,
        maxScale: 1
      });
    </script>
  </body>
</html>
