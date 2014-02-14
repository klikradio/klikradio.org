<?php



print '<!html>';

print '<head>';
foreach($page->get_head() as $element)
{
  print $element . "\n";
}
print '</head>';
print '<body>';

foreach($page->get_content() as $element)
{
  print $element . "\n";
}

print '</body>';
print "</html>";
