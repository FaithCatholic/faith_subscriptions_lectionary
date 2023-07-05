# FAITH Subscriptions Lectionary

This module provides a new content entity: lectionary. Lectionaries are numbered lists of specific biblical readings that match a particular theme, which are standarzied across the Church. This information is usually displayed within the main site content.

This data is stored as an entity to improve re-usability. Lectionaries are a somewhat standard set of readings within the Church, and keeping this data in a separate entity allows easier modification in the future without jeopardizing functionality of other content. This model also avoids duplicating data that may prove troublesome.

## How to use this module

1. Verify that the prerequisite module will work with your website:
<code>- drupal/auto_entitylabel</code>
2. Download the module from packagist using composer:
<pre><code>$ composer require faithcatholic/faith_subscriptions_lectionary</code></pre>
3. Enable the module via drush or within the administration area:
<pre><code>$ drush en faith_subscriptions_lectionary</code></pre>
4. Navigate to the content overview page at <code>Admin > Content</code> in the administrator toolbar.
5. Find the new tab above the content area called <code>Lectionaries</code>. This tab loads a page that shows a full list of existing lectionaries that have been saved to the website.
6. Choose a content type in which to add lectionary functionality. Using the admin toolbar, go to <code>Admin > Structure > Content Types > My Type</code>. On the next screen, click <code>Manage Fields</code> and add a reference field:
	- Click the <code>+ Add field</code> button.
	- Select <code>Reference > Other...</code> in the <code>Add a new field</code> dropdown and provide a label for the field.
	- On the next page, choose the <code>Lectionary</code> option under the <code>Type of item to reference</code> dropdown list.
	- Make sure <code> Allowed number of values</code> is set to <code>1</code>.
7. Now select the <code>Manage Form Display</code> tab for your content type, and set the form widget to be <code>Inline entity form - Complex</code> in the dropdown form.
	- Set the form display. Set options by clicking the gear icon on the far right-hand side of the applicable field in the list of fields.
	- Leave the form default settings as-is except those below:
		- &#x2611; <code>Allow users to add new nodes.</code>
		- &#x2611; <code>Allow users to add existing nodes.</code> Leave widget to add existing nodes as <code>Autocomplete</code>
		- &#x2611; <code>Allow users to edit existing nodes.</code> Leave autocomplete matching as <code>Contains</code>.
	- Set <code>Keep or delete unreferenced nodes</code> to <code>Keep always</code>.
8. Under the <code>Manage Display</code> tab of your content type, move the field display if necessary and choose the label option.
10. That's it! You're ready to add lectionaries. 
	- Best practice is to set up a content type, add an entity reference field for lectionaries as described in steps 6 and 7, and save the field. Then create content of that type and add a lectionary directly within the node add/edit form.
	- You can also create/edit/delete lectionaries on its admin overview page. Go to <code>Admin > Content > Lectionaries</code> and click the <code>+ Add lectionary</code> button.
