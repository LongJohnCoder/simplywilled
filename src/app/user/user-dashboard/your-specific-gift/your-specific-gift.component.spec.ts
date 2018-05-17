import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { YourSpecificGiftComponent } from './your-specific-gift.component';

describe('YourSpecificGiftComponent', () => {
  let component: YourSpecificGiftComponent;
  let fixture: ComponentFixture<YourSpecificGiftComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ YourSpecificGiftComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(YourSpecificGiftComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
