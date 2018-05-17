import { TestBed, inject } from '@angular/core/testing';

import { YourSpecificGiftService } from './your-specific-gift.service';

describe('YourSpecificGiftService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [YourSpecificGiftService]
    });
  });

  it('should be created', inject([YourSpecificGiftService], (service: YourSpecificGiftService) => {
    expect(service).toBeTruthy();
  }));
});
